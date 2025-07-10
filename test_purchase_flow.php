<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Suppress deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;

echo "=== Test Purchase Flow ===\n";

try {
    // Get client user
    $clientUser = User::where('role', 'client')->first();
    if (!$clientUser) {
        echo "❌ No client user found\n";
        exit;
    }
    echo "✅ Client user found: {$clientUser->username}\n";

    // Get first product
    $product = Product::first();
    if (!$product) {
        echo "❌ No product found\n";
        exit;
    }
    echo "✅ Product found: {$product->nama} - Rp {$product->harga}\n";

    // Create purchase manually (simulating form submission)
    $purchaseData = [
        'user_id' => $clientUser->id,
        'product_id' => $product->id,
        'quantity' => 2,
        'unit_price' => $product->harga,
        'total_price' => $product->harga * 2,
        'status' => 'completed'
    ];

    $purchase = Purchase::create($purchaseData);
    echo "✅ Purchase created with ID: {$purchase->id}\n";

    // Test relationship
    echo "✅ Purchase belongs to user: {$purchase->user->name}\n";
    echo "✅ Purchase for product: {$purchase->product->nama}\n";

    // Test history query
    $userPurchases = Purchase::with('product')
        ->where('user_id', $clientUser->id)
        ->orderBy('created_at', 'desc')
        ->get();

    echo "✅ User has {$userPurchases->count()} purchases\n";

    foreach ($userPurchases as $p) {
        echo "   - {$p->product->nama} x{$p->quantity} = Rp {$p->total_price}\n";
    }

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
