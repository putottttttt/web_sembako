<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function exportProducts()
    {
        $products = Product::all();
        
        $csvData = [];
        $csvData[] = ['ID', 'Nama Produk', 'Kategori', 'Harga', 'Gambar', 'Tanggal Dibuat'];
        
        foreach ($products as $product) {
            $csvData[] = [
                $product->id,
                $product->nama,
                $product->kategori,
                $product->harga,
                $product->gambar,
                $product->created_at ? $product->created_at->format('Y-m-d H:i:s') : '',
            ];
        }
        
        return $this->downloadCsv($csvData, 'data_produk_' . date('Y-m-d') . '.csv');
    }
    
    public function exportUsers()
    {
        $users = User::all();
        
        $csvData = [];
        $csvData[] = ['ID', 'Nama', 'Username', 'Email', 'Role', 'Tanggal Gabung'];
        
        foreach ($users as $user) {
            $csvData[] = [
                $user->id,
                $user->name,
                $user->username,
                $user->email,
                $user->role,
                $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : '',
            ];
        }
        
        return $this->downloadCsv($csvData, 'data_pengguna_' . date('Y-m-d') . '.csv');
    }
    
    private function downloadCsv($data, $filename)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($data) {
            $output = fopen('php://output', 'w');
            
            foreach ($data as $row) {
                fputcsv($output, $row);
            }
            
            fclose($output);
        };

        return Response::stream($callback, 200, $headers);
    }
}
