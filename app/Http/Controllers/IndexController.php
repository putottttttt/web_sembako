<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Toko Putra Sugema',
            'description' => 'Toko sembako, makanan, minuman, alat mandi, dan pencuci',
            'minuman'   => Product::where('kategori', 'minuman')->get(),
            'makanan'   => Product::where('kategori', 'makanan')->get(),
            'alatmandi' => Product::where('kategori', 'alatmandi')->get(),
            'pencuci'   => Product::where('kategori', 'pencuci')->get(),
        ]);
    }
}
