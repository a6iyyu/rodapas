<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengeluaran', function (Blueprint $table): void {
            $table->id('id_pengeluaran');
            $table->foreignId('id_restoran')->constrained('restoran', 'id_restoran');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};