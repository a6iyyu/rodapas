<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Restoran extends Seeder
{
    public function run(): void
    {
        DB::table('restoran')->insert([
            [
                'id_restoran'   => 1,
                'nama'          => 'Restoran Tim 60',
                'logo'          => '',
                'alamat'        => 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
                'nomor_telepon' => '08123456789',
                'akun_telegram' => '@restoran1',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        ]);
    }
}