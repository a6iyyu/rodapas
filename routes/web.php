<?php

declare(strict_types=1);

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Beranda;
use App\Http\Controllers\LogSuara;
use App\Http\Controllers\Menu;
use App\Http\Controllers\Pembayaran;
use App\Http\Controllers\Profil;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', fn() => view('pages.masuk'))->name('masuk');
    Route::get('/daftar', fn() => view('pages.daftar'))->name('daftar');
    Route::get('/lupa-kata-sandi', fn() => view('pages.lupa-kata-sandi'))->name('lupa-kata-sandi');
    Route::get('/ubah-kata-sandi', fn() => view('pages.ubah-kata-sandi'))->name('ubah-kata-sandi');
    Route::post('/masuk', [Autentikasi::class, 'login'])->name('autentikasi.masuk');
    Route::post('/daftar', [Autentikasi::class, 'register'])->name('autentikasi.daftar');
    Route::post('/lupa-kata-sandi', [Autentikasi::class, 'reset_password'])->name('autentikasi.lupa-kata-sandi');
    Route::post('/ubah-kata-sandi', [Autentikasi::class, 'update_password'])->name('autentikasi.ubah-kata-sandi');
});

Route::middleware('restaurant')->group(function () {
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

    /** Menu */
    Route::prefix('menu')->group(function () {
        Route::get('/', [Menu::class, 'index'])->name('menu');
        Route::get('/tambah', [Menu::class, 'create'])->name('menu.tambah');
        Route::get('/{id}/edit', [Menu::class, 'edit'])->name('menu.edit');
        Route::post('/tambah', [Menu::class, 'store'])->name('menu.simpan');
        Route::post('/{id}/edit', [Menu::class, 'update'])->name('menu.perbarui');
        Route::post('/{id}/hapus', [Menu::class, 'destroy'])->name('menu.hapus');
    });
    
    /** Profil Restoran */
    Route::get('/profil', [Profil::class, 'index'])->name('profil');
    Route::get('/profil/edit', [Profil::class, 'edit'])->name('profil.edit');
    Route::post('/profil/edit', [Profil::class, 'update'])->name('profil.perbarui');

    /** Autentikasi */
    Route::get('/keluar', [Autentikasi::class, 'logout'])->name('logout');
});