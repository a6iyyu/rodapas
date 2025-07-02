<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item', function (Blueprint $table): void {
            $table->id('id_item');
            $table->foreignId('id_restoran')->constrained('restoran', 'id_restoran');
            $table->string('nama')->unique();
            $table->string('gambar');
            $table->enum('kategori', ['KUDAPAN', 'MAKANAN', 'MINUMAN']);
            $table->integer('harga');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};