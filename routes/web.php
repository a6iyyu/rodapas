<?php

declare(strict_types=1);

use App\Http\Controllers\Bayar;
use App\Http\Controllers\Beranda;
use App\Http\Controllers\LogSuara;
use App\Http\Controllers\Profil;
use Illuminate\Support\Facades\Route;

/** Beranda */
Route::get('/', [Beranda::class, 'index'])->name('beranda');
Route::get('/keterangan', [Beranda::class, 'show'])->name('keterangan');
Route::post('/', [Beranda:: class, 'create'])->name('pesan');

/** Antrean */
Route::get('/bayar', [Bayar::class, 'index'])->name('bayar');

/** Keranjang */
Route::get('/keranjang', fn() => view('components.keranjang'))->name('keranjang.tampilkan');
Route::post('/keranjang/tambah', [Beranda::class, 'add'])->name('keranjang.tambah');
Route::post('/keranjang/bayar', [Beranda::class, 'checkout'])->name('keranjang.bayar');

/** Log Suara */
Route::post('/log-suara', [LogSuara:: class, 'index'])->name('log-suara');

/** Profil Restoran */
Route::get('/profil', [Profil::class, 'index'])->name('profil');
Route::get('/profil/edit', [Profil::class, 'edit'])->name('profil.edit');
Route::post('/profil/edit', [Profil::class, 'update'])->name('profil.perbarui');