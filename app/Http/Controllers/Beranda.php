<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
}