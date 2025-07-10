<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    /**
     * Menampilkan form pembelian
     */
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('purchases.create', compact('product'));
    }

    /**
     * Menyimpan pembelian ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->harga * $request->quantity;

        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_price' => $product->harga,
            'total_price' => $totalPrice,
            'status' => 'completed'
        ]);

        // Log success for debugging
        Log::info('Purchase created successfully', [
            'purchase_id' => $purchase->id,
            'user_id' => Auth::id(),
            'product_name' => $product->nama,
            'total_price' => $totalPrice
        ]);

        return redirect()->route('purchases.history')
            ->with('success', 'Pembelian berhasil disimpan!');
    }

    /**
     * Menampilkan riwayat pembelian user
     */
    public function history()
    {
        $purchases = Purchase::with('product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('purchases.history', compact('purchases'));
    }

    /**
     * Menampilkan semua riwayat pembelian untuk admin
     */
    public function adminHistory()
    {
        $purchases = Purchase::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.purchases.history', compact('purchases'));
    }

    /**
     * Menghapus pembelian (hanya untuk admin)
     */
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->back()
            ->with('success', 'Riwayat pembelian berhasil dihapus!');
    }
}
