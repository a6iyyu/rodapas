<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('antrean', function (Blueprint $table) {
            $table->id('id_antrean');
            $table->foreignId('id_transaksi')->constrained('transaksi', 'id_transaksi');
            $table->foreignId('id_item')->constrained('item', 'id_item');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antrean');
    }
};