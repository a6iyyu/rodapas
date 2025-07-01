<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Restoran extends Seeder
{
    public function run(): void
    {
        $destination = storage_path('app/public/logo');
        $source = public_path('img/polinema.jpg');

        if (!File::exists($destination)) File::makeDirectory($destination, 0755, true);
        if (File::exists($source)) File::copy($source, "$destination/polinema.jpg");

        DB::table('restoran')->insert([
            [
                'id_restoran'   => 1,
                'nama_restoran' => 'Restoran Tim 60',
                'email'         => 'restorantim60@gmail.com',
                'kata_sandi'    => Crypt::encryptString('password'),
                'akun_telegram' => '@restoran1',
                'logo'          => 'storage/logo/polinema.jpg',
                'alamat'        => 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
                'nomor_telepon' => '08123456789',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        ]);
    }
}