<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ClientUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cek apakah user client sudah ada
        if (!User::where('username', 'client')->exists()) {
            User::create([
                'name'     => 'Client User',
                'username' => 'client',
                'email'    => 'client@example.com',
                'password' => Hash::make('client123'),
                'role'     => 'client'
            ]);
        }
    }
}