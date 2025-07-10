<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('Login.login'); // resources/views/Login/login.blade.php
    }

    /**
     * Proses autentikasi login.
     */
    public function login(Request $request)
    {
        // Validasi input dari form
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'role'     => ['required'], // nilai dari select: admin/client
        ]);

        // ✅ Normalisasi nilai role menjadi huruf kecil
        $credentials['role'] = strtolower($credentials['role']);

        // Debug: log credentials untuk troubleshooting
        logger('Login attempt:', [
            'username' => $credentials['username'],
            'role' => $credentials['role'],
            'has_password' => !empty($credentials['password'])
        ]);

        // Proses autentikasi lengkap: cek username + password + role
        if (Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'role'     => $credentials['role'],
        ])) {
            $request->session()->regenerate();
            
            logger('Login successful for user: ' . Auth::user()->username);

            // Redirect berdasarkan role
            return match (Auth::user()->role) {
                'admin'  => redirect()->intended('/admin'),
                'client' => redirect()->intended('/index'),
                default  => redirect('/login')->withErrors([
                    'username' => 'Role tidak dikenali.',
                ]),
            };
        }

        // Debug: log failed login attempt
        logger('Login failed for:', [
            'username' => $credentials['username'],
            'role' => $credentials['role']
        ]);

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username, password, atau role salah.',
        ])->withInput($request->except('password'));
    }

    /**
     * Logout user dan hapus sesi.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}