<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('keterangan_item', function (Blueprint $table): void {
            $table->id('id_keterangan_item');
            $table->unsignedBigInteger('id_item');
            $table->string('nama_keterangan', 100);
            $table->json('pilihan');
            $table->boolean('wajib')->default(true);
            $table->timestamps();

            $table->foreign('id_item')->references('id_item')->on('item');
            $table->index('id_item');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keterangan_item');
    }
};