<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('log_suara', function (Blueprint $table): void {
            $table->id('id_log');
            $table->foreignId('id_restoran')->constrained('restoran', 'id_restoran');
            $table->foreignId('id_transaksi')->nullable()->constrained('transaksi', 'id_transaksi');
            $table->text('pesan');
            $table->json('hasil');
            $table->timestamp('waktu');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_suara');
    }
};