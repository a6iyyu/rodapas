<?php

declare(strict_types=1);

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Dasbor;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', fn() => view('pages.masuk'))->name('masuk')->withoutMiddleware('auth');
    Route::post('/masuk', [Autentikasi::class, 'masuk'])->withoutMiddleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [Dasbor::class, 'index'])->name('dasbor');
});