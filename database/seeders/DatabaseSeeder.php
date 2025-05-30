<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('restoran')->delete();
        DB::table('item')->delete();

        $this->call([
            Restoran::class,
            Item::class,
        ]);
    }
}