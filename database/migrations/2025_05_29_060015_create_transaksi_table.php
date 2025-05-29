<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table): void {
            $table->id('id_transaksi');
            $table->foreignId('id_restoran')->constrained('restoran',column:  'id_restoran');
            $table->date('tanggal');
            $table->integer('total');
            $table->enum('status', ['BATAL', 'SELESAI']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};