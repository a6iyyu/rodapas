<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Item;
use App\Models\KeteranganItem;
use App\Models\Transaksi;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Beranda extends Controller
{
    public function index(): View
    {
        try {
            $items = Item::all();
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
        try {
            $request->validate([
                'nama_pelanggan'                => 'required|string|max:50',
                'pesanan'                       => 'required|array|min:1',
                'pesanan.*.id_item'             => 'required|numeric|exists:item,id_item',
                'pesanan.*.jumlah'              => 'required|numeric|min:1',
                'pesanan.*.keterangan_pilihan'  => 'nullable|array',
            ]);
            
            DB::beginTransaction();

            $total = 0;
            foreach ($request->pesanan as $data) {
                $item = Item::findOrFail($data['id_item']);
                $total += $item->harga * $data['jumlah'];
            }

            $transaksi = Transaksi::create([
                'id_restoran'       => 1,
                'kode_transaksi'    => strtoupper(uniqid('TR-')),
                'nama_pelanggan'    => $request->nama_pelanggan,
                'tanggal'           => Carbon::today(),
                'total'             => $total,
                'status'            => 'MENUNGGU',
            ]);

            foreach ($request->pesanan as $data) {
                $item = Item::findOrFail($data['id_item']);
                $subtotal = $item->harga * $data['jumlah'];

                Antrean::create([
                    'id_transaksi'          => $transaksi->id_transaksi,
                    'id_item'               => $item->id_item,
                    'jumlah'                => $data['jumlah'],
                    'keterangan_pilihan'    => collect($data['keterangan_pilihan'] ?? [])->toJson(),
                    'subtotal'              => $subtotal,
                ]);
            }

            DB::commit();
            return to_route('beranda')->with('success', 'Transaksi berhasil dibuat.');
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);
            return back()->withErrors('Terjadi kesalahan pada server.');
        }
    }
}