<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('keterangan_item')->delete();
        DB::table('item')->delete();
        DB::table('restoran')->delete();

        $this->call([
            Restoran::class,
            Item::class,
            KeteranganItem::class,
        ]);
    }
}