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
            $table->string('nama_restoran')->unique();
            $table->string('email')->unique();
            $table->string('kata_sandi');
            $table->string('akun_telegram')->unique();
            $table->string('logo')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};