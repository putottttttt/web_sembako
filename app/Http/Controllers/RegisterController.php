<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi client.
     */
    public function showRegistrationForm()
    {
        // Pastikan file ini berada di: resources/views/Login/register.blade.php
        return view('Login.register');
    }

    /**
     * Proses registrasi user dengan role client.
     */
    public function register(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Simpan user baru ke dalam tabel users
        User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'client', // hardcode untuk client
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
