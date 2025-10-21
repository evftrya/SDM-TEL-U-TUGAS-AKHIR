<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListAdminUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all admin users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admins = User::where('is_admin', true)->get(['id', 'nama_lengkap', 'email', 'is_admin', 'created_at']);

        if ($admins->isEmpty()) {
            $this->info('No admin users found.');
            return 0;
        }

        $this->info('Admin Users:');
        $this->table(
            ['ID', 'Name', 'Email', 'Is Admin', 'Created At'],
            $admins->map(function ($admin) {
                return [
                    $admin->id,
                    $admin->name,
                    $admin->email,
                    $admin->is_admin ? 'Yes' : 'No',
                    $admin->created_at->format('Y-m-d H:i:s')
                ];
            })->toArray()
        );

        return 0;
    }
}
