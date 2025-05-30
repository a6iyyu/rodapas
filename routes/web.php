<?php

declare(strict_types=1);

use App\Http\Controllers\Beranda;
use Illuminate\Support\Facades\Route;

Route::get('/', [Beranda::class, 'index'])->name('beranda');