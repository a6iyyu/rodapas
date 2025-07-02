<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Transaksi;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Pembayaran extends Controller
{
    public function index(): View
    {
        try {
            $transactions = Transaksi::with('antrean.item')->where('status', '!=', Status::BATAL)->latest()->get();
            $qr = [];
            foreach ($transactions as $transaction) $qr[$transaction->id_transaksi] = $this->generate_qr_code($transaction->id_transaksi);
            return view('pages.pembayaran', compact('transactions', 'qr'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            abort(404, 'Data tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Terjadi kesalahan pada server.');
        }
    }

    public function cancel(string $id): RedirectResponse
    {
        try {
            $transaction = Transaksi::findOrFail($id);
            $transaction->update(['status' => Status::BATAL]);
            return back()->with('success', 'Transaksi berhasil dibatalkan.');
        } catch (Exception $exception) {
            report($exception);
            return back()->withErrors('Terjadi kesalahan saat membatalkan transaksi.');
        }
    }

    public function confirm(string $id): RedirectResponse
    {
        try {
            $transaction = Transaksi::findOrFail($id);
            $transaction->update(['status' => Status::DIPROSES]);
            return back()->with('success', 'Transaksi berhasil dikonfirmasi.');
        } catch (Exception $exception) {
            report($exception);
            return back()->withErrors('Terjadi kesalahan saat mengkonfirmasi transaksi.');
        }
    }

    private function generate_qr_code(int $id): HtmlString|string
    {
        try {
            $transaction = Transaksi::findOrFail($id);
            return QrCode::size(200)->generate($transaction->kode_transaksi);
        } catch (ModelNotFoundException $exception) {
            report($exception);
            abort(404, 'Data tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Terjadi kesalahan pada server.');
        }
    }
}