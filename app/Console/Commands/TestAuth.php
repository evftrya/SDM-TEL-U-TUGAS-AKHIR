<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestAuth extends Command
{
    protected $signature = 'auth:test {email} {password}';
    protected $description = 'Test authentication components';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $this->info('Testing authentication for ' . $email);

        // 1. Check if user exists
        $user = User::where('email_institusi', $email)->first();
        if (!$user) {
            $this->error('User not found');
            return 1;
        }
        $this->info('✓ User found: ' . $user->id);

        // 2. Show stored password hash
        $this->info('Stored password hash: ' . ($user->password ?? 'NULL'));
        
        // 3. Test direct hash comparison
        if (Hash::check($password, $user->password)) {
            $this->info('✓ Password hash matches directly');
        } else {
            $this->error('× Password hash does not match directly');
        }

        // 4. Test raw DB query
        $dbUser = DB::table('users')
            ->where('email_institusi', $email)
            ->select(['id', 'email_institusi', 'password'])
            ->first();
        
        $this->info('DB password hash: ' . ($dbUser->password ?? 'NULL'));

        // 5. Test Auth facade
        if (Auth::attempt(['email_institusi' => $email, 'password' => $password])) {
            $this->info('✓ Auth::attempt succeeded');
        } else {
            $this->error('× Auth::attempt failed');
        }

        // 6. Show auth configuration
        $this->info('Auth configuration:');
        $this->info('- Default guard: ' . config('auth.defaults.guard'));
        $this->info('- Guard driver: ' . config('auth.guards.web.driver'));
        $this->info('- Provider: ' . config('auth.guards.web.provider'));
        $this->info('- Provider driver: ' . config('auth.providers.users.driver'));
        $this->info('- Provider model: ' . config('auth.providers.users.model'));

        return 0;
    }
}