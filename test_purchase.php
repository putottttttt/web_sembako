<?php

// Test script untuk debug pembelian
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Suppress deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);

use Illuminate\Support\Facades\DB;

echo "=== Test Database Connection ===\n";

try {
    // Test koneksi database
    $pdo = DB::connection()->getPdo();
    echo "✅ Database connected successfully\n";
    
    // Test tabel purchases
    $purchases = DB::table('purchases')->count();
    echo "✅ Purchases table exists with {$purchases} records\n";
    
    // Test tabel products
    $products = DB::table('products')->count();
    echo "✅ Products table exists with {$products} records\n";
    
    // Test tabel users
    $users = DB::table('users')->count();
    echo "✅ Users table exists with {$users} records\n";
    
    // Test create dummy purchase
    if ($users > 0 && $products > 0) {
        $user = DB::table('users')->where('role', 'client')->first();
        $product = DB::table('products')->first();
        
        if ($user && $product) {
            $testPurchase = [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'unit_price' => $product->harga,
                'total_price' => $product->harga * 1,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now()
            ];
            
            $purchaseId = DB::table('purchases')->insertGetId($testPurchase);
            echo "✅ Test purchase created with ID: {$purchaseId}\n";
            
            // Verify purchase was saved
            $savedPurchase = DB::table('purchases')->find($purchaseId);
            if ($savedPurchase) {
                echo "✅ Purchase verified in database\n";
                echo "   User ID: {$savedPurchase->user_id}\n";
                echo "   Product ID: {$savedPurchase->product_id}\n";
                echo "   Quantity: {$savedPurchase->quantity}\n";
                echo "   Total: {$savedPurchase->total_price}\n";
            } else {
                echo "❌ Purchase not found after insert\n";
            }
        } else {
            echo "❌ No client user or product found for testing\n";
        }
    } else {
        echo "❌ Missing users or products for testing\n";
    }
    
} catch (Exception $e) {
    echo "❌ Database error: " . $e->getMessage() . "\n";
}
