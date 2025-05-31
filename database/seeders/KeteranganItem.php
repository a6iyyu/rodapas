<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganItem extends Seeder
{
    public function run(): void
    {
        $keterangan = [];

        $keterangan[] = [
            'id_item'           => 1,
            'nama_keterangan'   => 'Tingkat Kepedasan',
            'pilihan'           => json_encode(['Tidak Pedas', 'Sedang', 'Pedas']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 2,
            'nama_keterangan'   => 'Tingkat Kepedasan',
            'pilihan'           => json_encode(['Tidak Pedas', 'Sedang', 'Pedas', 'Extra Pedas']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 2,
            'nama_keterangan'   => 'Tingkat Kematangan',
            'pilihan'           => json_encode(['Well Done', 'Medium Well', 'Medium']),
            'wajib'             => false,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 3,
            'nama_keterangan'   => 'Tingkat Kepedasan',
            'pilihan'           => json_encode(['Tidak Pedas', 'Sedang', 'Pedas']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 4,
            'nama_keterangan'   => 'Tingkat Kepedasan',
            'pilihan'           => json_encode(['Tidak Pedas', 'Sedang', 'Pedas']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 5,
            'nama_keterangan'   => 'Lauk Tambahan',
            'pilihan'           => json_encode(['Tanpa Tambahan', 'Telur', 'Ayam', 'Tempe']),
            'wajib'             => false,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 6,
            'nama_keterangan'   => 'Takaran Gula',
            'pilihan'           => json_encode(['Tanpa Gula', 'Sedikit Manis', 'Normal', 'Extra Manis']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 6,
            'nama_keterangan'   => 'Takaran Es',
            'pilihan'           => json_encode(['Sedikit', 'Normal', 'Banyak']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 7,
            'nama_keterangan'   => 'Takaran Gula',
            'pilihan'           => json_encode(['Tanpa Gula', 'Sedikit Manis', 'Normal', 'Extra Manis']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 7,
            'nama_keterangan'   => 'Takaran Es',
            'pilihan'           => json_encode(['Sedikit', 'Normal', 'Banyak']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 8,
            'nama_keterangan'   => 'Takaran Gula',
            'pilihan'           => json_encode(['Tanpa Gula', 'Sedikit Manis', 'Normal', 'Extra Manis']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 8,
            'nama_keterangan'   => 'Takaran Es',
            'pilihan'           => json_encode(['Sedikit', 'Normal', 'Banyak']),
            'wajib'             => true,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        $keterangan[] = [
            'id_item'           => 8,
            'nama_keterangan'   => 'Ukuran Gelas',
            'pilihan'           => json_encode(['Small', 'Medium', 'Large']),
            'wajib'             => false,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];

        DB::table('keterangan_item')->insert($keterangan);
    }
}