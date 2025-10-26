<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HashPlaintextPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:hash-passwords {--dry-run : Show what would be changed without saving}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash any plaintext values in users.password_hash (skip already-hashed entries).';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Scanning users for plaintext password_hash values...');

        $users = User::all();
        $count = 0;
        $changed = 0;

        $column = Schema::hasColumn('users', 'password_hash') ? 'password_hash' : 'password';

        foreach ($users as $user) {
            $count++;

            $pw = $user->{$column};

            if (empty($pw)) {
                $this->line("[SKIP] user {$user->id} ({$user->email_institusi}) empty password in column {$column}");
                continue;
            }

            // Heuristic: if it already starts with a known hash prefix, skip.
            if (Str::startsWith($pw, ['\$2y\$', '\$2x\$', '\$argon$', '\$argon2i$', '\$argon2id$'])) {
                $this->line("[OK]   user {$user->id} ({$user->email_institusi}) already hashed in column {$column}");
                continue;
            }

            // Otherwise assume plaintext and hash it.
            $this->line("[HASH] user {$user->id} ({$user->email_institusi}) -> hashing column {$column}");
            $changed++;

            if (! $this->option('dry-run')) {
                // Use direct DB update to avoid any model mutators or attribute mapping.
                DB::table('users')->where('id', $user->id)->update([
                    $column => Hash::make($pw),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->info("Scanned: {$count} users. Will/have hashed: {$changed} users.");

        if ($this->option('dry-run')) {
            $this->comment('Dry-run mode: no changes were saved. Re-run without --dry-run to apply changes.');
        }

        return 0;
    }
}
