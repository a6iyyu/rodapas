<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('restoran', function (Blueprint $table): void {
            $table->id('id_restoran');
            $table->string('nama')->unique();
            $table->string('logo')->nullable();
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('akun_telegram');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};