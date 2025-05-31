<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Item extends Seeder
{
    public function run(): void
    {
        $items = ['nasi-goreng.jpg', 'ayam-bakar.jpg', 'soto-ayam.jpg', 'mie-goreng.jpg', 'nasi-uduk.jpg', 'es-teh.jpg', 'es-jeruk.jpg', 'es-kopi.jpg'];
        $destination = storage_path('app/public/items');
        if (!File::exists($destination)) File::makeDirectory($destination, 0755, true);

        foreach ($items as $file) {
            $source = public_path('img') . '/' . $file;
            $target = "$destination/$file";
            if (File::exists($source)) File::copy($source, $target);
        }

        // Insert items
        DB::table('item')->insert([
            [
                'id_item'       => 1,
                'id_restoran'   => 1,
                'nama'          => 'Nasi Goreng',
                'gambar'        => 'storage/items/nasi-goreng.jpg',
                'kategori'      => 'MAKANAN',
                'harga'         => 10000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 2,
                'id_restoran'   => 1,
                'nama'          => 'Ayam Bakar',
                'gambar'        => 'storage/items/ayam-bakar.jpg',
                'kategori'      => 'MAKANAN',
                'harga'         => 20000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 3,
                'id_restoran'   => 1,
                'nama'          => 'Soto Ayam',
                'gambar'        => 'storage/items/soto-ayam.jpg',
                'kategori'      => 'MAKANAN',
                'harga'         => 15000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 4,
                'id_restoran'   => 1,
                'nama'          => 'Mie Goreng',
                'gambar'        => 'storage/items/mie-goreng.jpg',
                'kategori'      => 'MAKANAN',
                'harga'         => 15000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 5,
                'id_restoran'   => 1,
                'nama'          => 'Nasi Uduk',
                'gambar'        => 'storage/items/nasi-uduk.jpg',
                'kategori'      => 'MAKANAN',
                'harga'         => 15000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 6,
                'id_restoran'   => 1,
                'nama'          => 'Es Teh',
                'gambar'        => 'storage/items/es-teh.jpg',
                'kategori'      => 'MINUMAN',
                'harga'         => 5000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 7,
                'id_restoran'   => 1,
                'nama'          => 'Es Jeruk',
                'gambar'        => 'storage/items/es-jeruk.jpg',
                'kategori'      => 'MINUMAN',
                'harga'         => 5000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_item'       => 8,
                'id_restoran'   => 1,
                'nama'          => 'Es Kopi',
                'gambar'        => 'storage/items/es-kopi.jpg',
                'kategori'      => 'MINUMAN',
                'harga'         => 5000,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}