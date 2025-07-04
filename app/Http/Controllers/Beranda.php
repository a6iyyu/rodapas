<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Antrean;
use App\Models\Item;
use App\Models\KeteranganItem;
use App\Models\Restoran;
use App\Models\Transaksi;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class Beranda extends Controller
{
    public function index(): View
    {
        try {
            $restaurant = Auth::user();
            $items = Item::where('id_restoran', $restaurant->id_restoran)->get();
            return view('pages.beranda', compact('items'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            abort(404, 'Oops, data yang kamu cari tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Terjadi kesalahan pada server.');
        }
    }

    public function show(): array
    {
        try {
            $description = KeteranganItem::all();
            return compact('description');
        } catch (ModelNotFoundException $exception) {
            report($exception);
            abort(404, 'Oops, data yang kamu cari tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Terjadi kesalahan pada server.');
        }
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'id_item'            => 'required|numeric|exists:item,id_item',
            'jumlah'             => 'required|numeric|min:1',
            'keterangan_pilihan' => 'nullable|array',
        ]);

        $item = Item::findOrFail($request->id_item);
        $cart = Session::get('cart', []);
        $cart[] = [
            'id_item'            => $item->id_item,
            'nama'               => $item->nama,
            'harga'              => $item->harga,
            'jumlah'             => $request->jumlah,
            'keterangan_pilihan' => $request->keterangan_pilihan ?? [],
            'subtotal'           => $item->harga * $request->jumlah,
        ];

        Session::put('cart', $cart);
        return back()->with('success', 'Item berhasil ditambahkan ke keranjang.');
    }

    public function checkout(Request $request): RedirectResponse
    {
        $request->validate(['nama_pelanggan' => 'required|string|max:50']);
        $cart = Session::get('cart', []);
        if (empty($cart)) return back()->withErrors('Keranjang kosong.');

        DB::beginTransaction();
        try {
            $item_pertama = Item::findOrFail($cart[0]['id_item']);
            $restoran = Restoran::findOrFail($item_pertama->id_restoran);

            $total = collect($cart)->sum('subtotal');
            $transaksi = Transaksi::create([
                'id_restoran'       => $restoran->id_restoran,
                'kode_transaksi'    => strtoupper(uniqid('TR-')),
                'nama_pelanggan'    => $request->nama_pelanggan,
                'tanggal'           => Carbon::now()->format('Y-m-d'),
                'total'             => $total,
                'status'            => Status::MENUNGGU,
            ]);

            foreach ($cart as $item) {
                Antrean::create([
                    'id_transaksi'       => $transaksi->id_transaksi,
                    'id_item'            => $item['id_item'],
                    'jumlah'             => $item['jumlah'],
                    'keterangan_pilihan' => collect($item['keterangan_pilihan'])->toJson(),
                    'subtotal'           => $item['subtotal'],
                ]);
            }

            Session::forget('cart');
            DB::commit();
            return to_route('beranda')->with('success', 'Transaksi berhasil dibuat.');
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            return back()->withErrors('Gagal membuat transaksi.');
        }
    }

    public function remove(int $id): JsonResponse
    {
        $cart = session('cart', []);
        if (!isset($cart[$id])) return Response::json(['success' => false, 'message' => 'Item tidak ditemukan.'], 404);

        unset($cart[$id]);
        $cart = array_values($cart);
        Session::put('cart', $cart);

        return Response::json(['success' => true, 'message' => 'Item berhasil dihapus.']);
    }
}