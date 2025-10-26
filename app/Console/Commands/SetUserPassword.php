<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SetUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:set-password {email_institusi} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set (hash) the password for a user identified by email_institusi';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->argument('email_institusi');
        $password = $this->argument('password');

        $user = User::where('email_institusi', $email)->first();

        if (! $user) {
            $this->error("User with email_institusi '{$email}' not found.");
            return 1;
        }

        // Detect which column exists in the database and write the hashed password there.
        $column = Schema::hasColumn('users', 'password_hash') ? 'password_hash' : 'password';

        // Write directly to the model's attributes array to avoid hitting the
        // `password` mutator which would map to `password_hash` and cause
        // mismatched column updates when the DB uses a different column name.
        // Use direct DB update to avoid any model mutators or attribute mapping.
        DB::table('users')->where('id', $user->id)->update([
            $column => Hash::make($password),
            'updated_at' => now(),
        ]);

        $this->info("Password updated for user {$user->id} ({$user->email_institusi}) in column '{$column}'.");
        return 0;
    }
}
