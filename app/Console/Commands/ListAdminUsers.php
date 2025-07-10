<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

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
     *
     * @return int
     */
    public function handle()
    {
        $admins = User::where('role', 'admin')->get();

        if ($admins->count() === 0) {
            $this->error('❌ Tidak ada admin yang ditemukan!');
            return Command::FAILURE;
        }

        $this->info("👨‍💼 Daftar Admin Toko Putra Sugema ({$admins->count()} admin)");
        $this->line("");

        $headers = ['ID', 'Nama', 'Username', 'Email', 'Tanggal Dibuat'];
        $rows = [];

        foreach ($admins as $admin) {
            $rows[] = [
                $admin->id,
                $admin->name,
                $admin->username,
                $admin->email,
                $admin->created_at ? $admin->created_at->format('d/m/Y H:i') : '-'
            ];
        }

        $this->table($headers, $rows);

        $this->line("");
        $this->line("🔑 Semua admin dapat login di: http://localhost:8000/admin");
        $this->line("📋 Total admin: {$admins->count()}");

        return Command::SUCCESS;
    }
}
