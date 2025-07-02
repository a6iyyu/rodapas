<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Antrean;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Profil extends Controller
{
    public function index(): View
    {
        try {
            $restoran = Auth::user();
            if (!$restoran) abort(404, 'Profil perusahaan Anda tidak ditemukan.');

            $antrean = Antrean::whereHas('transaksi', function (Builder $query) use ($restoran) {
                $query->where('id_restoran', $restoran->id_restoran)->where('status', Status::MENUNGGU);
            })->latest()->take(3)->with(['item', 'transaksi'])->get();
            if ($antrean->isEmpty()) $antrean = null;

            return view('pages.profil', compact('antrean', 'restoran'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            Log::error('Profil perusahaan Anda tidak ditemukan: ' . $exception->getMessage());
            abort(404, 'Profil perusahaan Anda tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan pada server: ' . $exception->getMessage());
            abort(500, 'Terjadi kesalahan pada server.');
        }
    }

    public function edit() {}

    public function update(Request $request): RedirectResponse
    {
        try {
            $request->validate([]);
            return back()->with('success', 'Berhasil memperbarui profil restoran Anda!');
        } catch (Exception $exception) {
            report($exception);
            return back()->withErrors('Terjadi kesalahan pada server.');
        }
    }
}