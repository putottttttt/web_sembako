<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DebugUserLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:user-login {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug user login data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');
        
        $user = User::where('username', $username)->first();
        
        if (!$user) {
            $this->error("User dengan username '{$username}' tidak ditemukan!");
            return Command::FAILURE;
        }

        $this->info("=== DEBUG USER LOGIN ===");
        $this->info("ID: {$user->id}");
        $this->info("Name: {$user->name}");
        $this->info("Username: {$user->username}");
        $this->info("Email: {$user->email}");
        $this->info("Role: {$user->role}");
        $this->info("Password Hash: {$user->password}");
        $this->info("Created At: {$user->created_at}");
        $this->info("Updated At: {$user->updated_at}");
        
        // Test password
        $testPassword = $this->ask('Masukkan password untuk test');
        
        if (Hash::check($testPassword, $user->password)) {
            $this->info("✅ Password BENAR!");
        } else {
            $this->error("❌ Password SALAH!");
        }
        
        // Test role
        if (strtolower($user->role) === 'admin') {
            $this->info("✅ Role adalah 'admin'");
        } else {
            $this->error("❌ Role bukan 'admin', tetapi: '{$user->role}'");
        }

        return Command::SUCCESS;
    }
}
