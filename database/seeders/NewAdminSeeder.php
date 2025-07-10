<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class NewAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin baru dengan credential berbeda
        $newAdmins = [
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@tokosembako.com',
                'password' => Hash::make('super123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Manager Toko',
                'username' => 'manager',
                'email' => 'manager@tokosembako.com',
                'password' => Hash::make('manager123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Admin Putra',
                'username' => 'adminputra',
                'email' => 'adminputra@tokosembako.com',
                'password' => Hash::make('putra123'),
                'role' => 'admin'
            ]
        ];

        foreach ($newAdmins as $admin) {
            // Cek apakah username sudah ada
            if (!User::where('username', $admin['username'])->exists()) {
                User::create($admin);
                echo "✅ Admin '{$admin['username']}' berhasil dibuat\n";
            } else {
                echo "⚠️ Admin '{$admin['username']}' sudah ada\n";
            }
        }
    }
}
