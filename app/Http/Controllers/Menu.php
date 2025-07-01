<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Menu extends Controller
{
    public function index(): RedirectResponse|View
    {
        try {
            return view('pages.menu');
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan dalam menampilkan menu: ' . $exception->getMessage());
            return to_route('beranda')->with('error', 'Terjadi kesalahan dalam menampilkan menu.');
        }
    }

    public function create() {}

    public function edit() {}

    public function store() {}

    public function update() {}

    public function destroy(): RedirectResponse
    {
        try {
            return to_route('menu')->with('success', 'Menu berhasil dihapus.');
        } catch (ModelNotFoundException $exception) {
            report($exception);
            Log::error('Menu tidak ditemukan: ' . $exception->getMessage());
            return to_route('menu')->with('error', 'Menu tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            Log::error('Gagal menghapus menu: ' . $exception->getMessage());
            return to_route('menu')->with('error', 'Gagal menghapus menu.');
        }
    }
}