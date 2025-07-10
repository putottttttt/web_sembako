<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Makanan
            [
                'nama' => 'Beras Ramos 5kg',
                'kategori' => 'makanan',
                'harga' => 55000,
                'gambar' => 'makanan/beras.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Minyak Goreng 1L',
                'kategori' => 'makanan',
                'harga' => 16000,
                'gambar' => 'makanan/minyak.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Indomie Goreng',
                'kategori' => 'makanan',
                'harga' => 3000,
                'gambar' => 'makanan/mie-instan.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Gula Pasir 1kg',
                'kategori' => 'makanan',
                'harga' => 14000,
                'gambar' => 'makanan/gula.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Tepung Terigu 1kg',
                'kategori' => 'makanan',
                'harga' => 12000,
                'gambar' => 'makanan/tepung.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Telur Ayam 1kg',
                'kategori' => 'makanan',
                'harga' => 25000,
                'gambar' => 'makanan/telur.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Minuman
            [
                'nama' => 'Aqua Botol 600ml',
                'kategori' => 'minuman',
                'harga' => 3000,
                'gambar' => 'aqua.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Teh Botol Sosro',
                'kategori' => 'minuman',
                'harga' => 5000,
                'gambar' => 'tehbotol.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Susu Ultra Milk',
                'kategori' => 'minuman',
                'harga' => 7000,
                'gambar' => 'susuultra.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Floridina',
                'kategori' => 'minuman',
                'harga' => 4000,
                'gambar' => 'floridina.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Indomilk Kaleng',
                'kategori' => 'minuman',
                'harga' => 12000,
                'gambar' => 'minuman/indomilk.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Kopi Kapal Api',
                'kategori' => 'minuman',
                'harga' => 8000,
                'gambar' => 'minuman/kopi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Alat Mandi
            [
                'nama' => 'Sabun Mandi Lifebuoy',
                'kategori' => 'alatmandi',
                'harga' => 5000,
                'gambar' => 'alatmandi/sabun.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Shampo Sunsilk 170ml',
                'kategori' => 'alatmandi',
                'harga' => 18000,
                'gambar' => 'alatmandi/sampo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Pepsodent 190gr',
                'kategori' => 'alatmandi',
                'harga' => 12000,
                'gambar' => 'alatmandi/pasta-gigi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Tisu Paseo 250 Sheets',
                'kategori' => 'alatmandi',
                'harga' => 15000,
                'gambar' => 'alatmandi/tisu.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Sikat Gigi Formula',
                'kategori' => 'alatmandi',
                'harga' => 7000,
                'gambar' => 'alatmandi/sikat-gigi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Deodorant Rexona',
                'kategori' => 'alatmandi',
                'harga' => 20000,
                'gambar' => 'alatmandi/deodorant.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // Pencuci
            [
                'nama' => 'Sabun Cuci Piring Sunlight',
                'kategori' => 'pencuci',
                'harga' => 8000,
                'gambar' => 'produk-pencuci/sabun-cuci-piring.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Detergen Bubuk Rinso',
                'kategori' => 'pencuci',
                'harga' => 15000,
                'gambar' => 'produk-pencuci/detergen-bubuk.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Cairan Pel Lantai Bayclin',
                'kategori' => 'pencuci',
                'harga' => 12000,
                'gambar' => 'produk-pencuci/cairan-pel-lantai.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Sabun Cuci Baju Cair Attack',
                'kategori' => 'pencuci',
                'harga' => 18000,
                'gambar' => 'produk-pencuci/sabun-cuci-baju-cair.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Wipol Pembersih Lantai',
                'kategori' => 'pencuci',
                'harga' => 15000,
                'gambar' => 'produk-pencuci/wipol.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Soklin Liquid',
                'kategori' => 'pencuci',
                'harga' => 22000,
                'gambar' => 'produk-pencuci/soklin.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}