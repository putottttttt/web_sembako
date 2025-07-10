<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Suppress deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;

echo "=== Test Authenticated Purchase Flow ===\n";

try {
    // Get client user
    $clientUser = User::where('username', 'client')->first();
    if (!$clientUser) {
        echo "❌ No client user found\n";
        exit;
    }
    
    // Simulate login
    Auth::login($clientUser);
    echo "✅ Logged in as: " . Auth::user()->username . "\n";
    echo "✅ Auth ID: " . Auth::id() . "\n";
    echo "✅ Is authenticated: " . (Auth::check() ? 'Yes' : 'No') . "\n";

    // Get first product
    $product = Product::first();
    if (!$product) {
        echo "❌ No product found\n";
        exit;
    }
    echo "✅ Product found: {$product->nama} - Rp {$product->harga}\n";

    // Simulate PurchaseController::store() method
    $quantity = 3;
    $totalPrice = $product->harga * $quantity;

    echo "✅ Creating purchase with:\n";
    echo "   - User ID: " . Auth::id() . "\n";
    echo "   - Product ID: {$product->id}\n";
    echo "   - Quantity: {$quantity}\n";
    echo "   - Unit Price: {$product->harga}\n";
    echo "   - Total Price: {$totalPrice}\n";

    $purchase = Purchase::create([
        'user_id' => Auth::id(),
        'product_id' => $product->id,
        'quantity' => $quantity,
        'unit_price' => $product->harga,
        'total_price' => $totalPrice,
        'status' => 'completed'
    ]);

    echo "✅ Purchase created with ID: {$purchase->id}\n";

    // Test history query like in PurchaseController::history()
    $purchases = Purchase::with('product')
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

    echo "✅ Purchase history for user {$clientUser->username}:\n";
    foreach ($purchases as $p) {
        echo "   - ID: {$p->id} | {$p->product->nama} x{$p->quantity} = Rp {$p->total_price} | {$p->created_at}\n";
    }

    echo "✅ Total purchases: {$purchases->count()}\n";

    // Logout
    Auth::logout();
    echo "✅ Logged out\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
