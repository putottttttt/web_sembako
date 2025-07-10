<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {username} {password} {--name=} {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password = $this->argument('password');
        $name = $this->option('name') ?? ucfirst($username);
        $email = $this->option('email') ?? $username . '@tokosembako.com';

        // Cek apakah username sudah ada
        if (User::where('username', $username)->exists()) {
            $this->error("❌ Username '{$username}' sudah digunakan!");
            return Command::FAILURE;
        }

        // Buat admin baru
        $admin = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin'
        ]);

        $this->info("✅ Admin berhasil dibuat!");
        $this->line("📋 Detail Admin:");
        $this->line("   Nama: {$admin->name}");
        $this->line("   Username: {$admin->username}");
        $this->line("   Email: {$admin->email}");
        $this->line("   Role: {$admin->role}");
        $this->line("");
        $this->line("🔐 Login dengan:");
        $this->line("   Username: {$username}");
        $this->line("   Password: {$password}");
        $this->line("   Role: admin");

        return Command::SUCCESS;
    }
}
