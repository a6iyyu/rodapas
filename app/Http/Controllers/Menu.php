<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\ItemCategory;
use App\Models\Antrean;
use App\Models\Item;
use App\Models\KeteranganItem;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class Menu extends Controller
{
    public function index(): RedirectResponse|View
    {
        try {
            /** Menampilkan semua menu yang tersedia di restoran. */
            $restoran = Auth::user();
            if (!$restoran) abort(404, 'Profil restoran tidak ditemukan.');

            $menu = Item::where('id_restoran', $restoran->id_restoran)->with('keterangan_item')->get();

            /** Menghitung total menu yang tersedia di restoran */
            $total_menu = Item::all()->count();
            $total_makanan = Item::where('kategori', ItemCategory::MAKANAN)->count();
            $total_minuman = Item::where('kategori', ItemCategory::MINUMAN)->count();
            $total_kudapan = Item::where('kategori', ItemCategory::KUDAPAN)->count();
            return view('pages.menu', compact('menu', 'total_menu', 'total_makanan', 'total_minuman', 'total_kudapan'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            Log::error('Menu tidak ditemukan: ' . $exception->getMessage());
            return to_route('beranda')->with('error', 'Menu tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan dalam menampilkan menu: ' . $exception->getMessage());
            return to_route('beranda')->with('error', 'Terjadi kesalahan dalam menampilkan menu.');
        }
    }

    public function create(Request $request): JsonResponse
    {
        try {
            $request->validate([]);
            return Response::json(['success' => true, 'message' => 'Menu berhasil ditambahkan.']);
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan dalam menambahkan menu: ' . $exception->getMessage());
            return Response::json(['success' => false, 'message' => 'Terjadi kesalahan dalam menambahkan menu.']);
        }
    }

    public function edit() {}

    public function store() {}

    public function update() {}

    public function destroy(int $id): RedirectResponse
    {
        try {
            Antrean::where('id_item', $id)->delete();
            KeteranganItem::where('id_item', $id)->delete();
            Item::findOrFail($id)->delete();
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