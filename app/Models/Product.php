<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama',
        'kategori', 
        'harga',
        'gambar',
    ];

    /**
     * Relasi dengan Purchase
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}