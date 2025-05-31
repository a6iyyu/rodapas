<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('antrean', function (Blueprint $table) {
            $table->dropForeign(['id_transaksi']);
        });

        Schema::table('antrean', function (Blueprint $table): void {
            $table->unsignedBigInteger('id_transaksi')->nullable()->change();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            $table->json('keterangan_pilihan')->nullable()->after('jumlah');
        });
    }

    public function down(): void
    {
        Schema::table('antrean', function (Blueprint $table) {
            $table->dropForeign(['id_transaksi']);
            $table->dropColumn('keterangan_pilihan');
        });

        Schema::table('antrean', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi')->change();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
        });
    }
};