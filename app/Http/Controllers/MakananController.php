<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    // ✅ Tampilkan Form Tambah Produk Makanan
    public function create()
    {
        return view('Client.makanan');
    }

    // ✅ Simpan ke Session
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar ke folder 'public/produk/makanan'
        $path = $request->file('gambar')->store('produk/makanan', 'public');

        // Simpan ke session
        session()->push('produk_makanan', [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $path,
        ]);

        return redirect()->back()->with('success', 'Produk makanan berhasil ditambahkan.');
    }
}

