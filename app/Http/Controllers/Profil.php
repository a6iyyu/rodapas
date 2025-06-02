<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Profil extends Controller
{
    public function index(): View
    {
        try {
            return view('pages.profil');
        } catch (ModelNotFoundException $exception) {
            report($exception);
            abort(404, 'Profil perusahaan Anda tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
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