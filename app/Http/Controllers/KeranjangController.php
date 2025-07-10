<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Tambah produk ke keranjang
    public function tambah(Request $request)
    {
        $produk = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => 1
        ];

        $keranjang = session()->get('keranjang', []);
        $keranjang[] = $produk;
        session()->put('keranjang', $keranjang);

        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Tampilkan halaman keranjang
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        return view('keranjang', compact('keranjang'));
    }

    // Proses checkout dengan metode pembayaran dan pengiriman
    public function checkout(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|in:bayar_sekarang,paylater',
            'metode_pengiriman' => 'required|in:ambil_ditempat,cod',
        ]);

        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('keranjang')->with('success', 'Keranjang kamu sudah kosong.');
        }

        // Ambil input dari form
        $metodeBayar = ucfirst(str_replace('_', ' ', $request->metode_pembayaran));
        $metodeKirim = strtoupper(str_replace('_', ' ', $request->metode_pengiriman));

        // (Optional) Simpan data ke database jika ada model pembelian

        // Kosongkan keranjang
        session()->forget('keranjang');

        return redirect()->route('keranjang')->with('success', "Checkout berhasil menggunakan metode: $metodeBayar & $metodeKirim");
    }
}
