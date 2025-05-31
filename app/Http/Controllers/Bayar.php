<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Bayar extends Controller
{
    public function index(): View
    {
        try {
            $transactions = Transaksi::with('antrean.item')->latest()->get();
            $qr = [];
            foreach ($transactions as $transaction) $qr[$transaction->id_transaksi] = $this->generate_qr_code($transaction->id_transaksi); 
            return view('pages.antrean', compact('transactions', 'qr'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            abort(404, 'Data tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Terjadi kesalahan pada server.');
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