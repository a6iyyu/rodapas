<?php

declare(strict_types=1);

use App\Http\Controllers\Beranda;
use App\Http\Controllers\LogSuara;
use App\Http\Controllers\Pembayaran;
use App\Http\Controllers\Profil;
use Illuminate\Support\Facades\Route;

/** Beranda */
Route::get('/', [Beranda::class, 'index'])->name('beranda');
Route::get('/keterangan', [Beranda::class, 'show'])->name('keterangan');

/** Keranjang */
Route::get('/keranjang', fn() => view('components.beranda.keranjang'))->name('keranjang');
Route::post('/keranjang/tambah', [Beranda::class, 'create'])->name('keranjang.tambah');
Route::post('/keranjang/bayar', [Beranda::class, 'checkout'])->name('keranjang.bayar');

/** Pembayaran */
Route::get('/pembayaran', [Pembayaran::class, 'index'])->name('pembayaran');
Route::post('/pembayaran/{id}/batal', [Pembayaran::class, 'cancel'])->name('pembayaran.batal');
Route::post('/pembayaran/{id}/konfirmasi', [Pembayaran::class, 'confirm'])->name('pembayaran.konfirmasi');

/** Log Suara */
Route::post('/log-suara', [LogSuara::class, 'index'])->name('log-suara');

/** Profil Restoran */
Route::get('/profil', [Profil::class, 'index'])->name('profil');
Route::get('/profil/edit', [Profil::class, 'edit'])->name('profil.edit');
Route::post('/profil/edit', [Profil::class, 'update'])->name('profil.perbarui');