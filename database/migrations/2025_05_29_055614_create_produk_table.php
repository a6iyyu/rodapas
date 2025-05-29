<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table): void {
            $table->id('id_produk');
            $table->foreignId('id_restoran')->constrained('restoran', 'id_restoran');
            $table->string('nama')->unique();
            $table->enum('kategori', ['KUDAPAN', 'MAKANAN', 'MINUMAN']);
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};