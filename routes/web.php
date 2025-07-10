<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PurchaseController;

// 🏠 HOME (tanpa auth)
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin');
        } elseif ($user->role === 'client') {
            return redirect('/index');
        }
    }
    return view('welcome');
})->name('welcome');

// 🔐 AUTENTIKASI
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 📝 REGISTRASI
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 📦 HALAMAN SETELAH LOGIN
Route::middleware(['auth'])->group(function () {

    // ====================== CLIENT =========================

    // Landing Page (Client)
    Route::get('/index', [IndexController::class, 'index'])->name('home');

    // Halaman Produk Client
    Route::view('/minuman', 'minuman')->name('minuman');
    Route::view('/alatmandi', 'alatmandi')->name('alatmandi');
    Route::view('/pencuci', 'pencuci')->name('pencuci');
    Route::view('/makanan', 'Client.makanan')->name('makanan');
    Route::post('/makanan/store', [MakananController::class, 'store'])->name('client.makanan.store');

    // 🛒 Keranjang & Checkout
    Route::post('/beli', [KeranjangController::class, 'tambah'])->name('beli.produk');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');

    // 💰 Pembelian
    Route::get('/purchase/{product}', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('/purchase-history', [PurchaseController::class, 'history'])->name('purchases.history');

    // ====================== ADMIN =========================

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'indexadmin'])->name('admin.dashboard');
        Route::resource('/admin/products', ProductController::class, ['names' => 'products']);
        Route::resource('/admin/users', UserController::class, ['names' => 'users']);
        
        // 💰 Riwayat Pembelian Admin
        Route::get('/admin/purchases', [PurchaseController::class, 'adminHistory'])->name('admin.purchases.history');
        Route::delete('/admin/purchases/{purchase}', [PurchaseController::class, 'destroy'])->name('admin.purchases.destroy');
        
        // Export routes
        Route::get('/admin/export/products', [ExportController::class, 'exportProducts'])->name('admin.export.products');
        Route::get('/admin/export/users', [ExportController::class, 'exportUsers'])->name('admin.export.users');
    });

}); // ← penutup group auth middleware