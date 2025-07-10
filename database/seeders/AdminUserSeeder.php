<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'username' => 'admin', // Wajib diisi jika kolom username tidak nullable
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin'
        ]);
    }
}
