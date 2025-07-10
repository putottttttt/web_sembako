<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:reset-password {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset password for admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password = $this->argument('password');
        
        $user = User::where('username', $username)
                    ->where('role', 'admin')
                    ->first();
        
        if (!$user) {
            $this->error("Admin dengan username '{$username}' tidak ditemukan!");
            return Command::FAILURE;
        }

        $user->password = Hash::make($password);
        $user->save();

        $this->info("✅ Password admin '{$username}' berhasil direset!");
        $this->info("Username: {$username}");
        $this->info("Password: {$password}");

        return Command::SUCCESS;
    }
}
