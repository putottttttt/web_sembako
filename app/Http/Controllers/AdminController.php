<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function indexadmin()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalClients = User::where('role', 'client')->count();

        // Data produk per kategori untuk chart
        $productsByCategory = Product::selectRaw('kategori, COUNT(*) as count')
            ->groupBy('kategori')
            ->get()
            ->pluck('count', 'kategori')
            ->toArray();

        // Pastikan semua kategori ada dengan nilai default 0
        $defaultCategories = ['makanan' => 0, 'minuman' => 0, 'alatmandi' => 0, 'pencuci' => 0];
        $productsByCategory = array_merge($defaultCategories, $productsByCategory);

        // Recent products
        $recentProducts = Product::orderBy('id', 'desc')->take(5)->get();

        // Recent users
        $recentUsers = User::orderBy('id', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalUsers', 
            'totalAdmins', 
            'totalClients',
            'productsByCategory',
            'recentProducts',
            'recentUsers'
        ));
    }
}
