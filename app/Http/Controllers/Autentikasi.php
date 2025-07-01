<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Restoran;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Autentikasi extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'email'         => 'required|string|email|max:255',
                'kata_sandi'    => 'required|string|min:8',
            ]);

            $restoran = Restoran::where('email', $request->input('email'))->firstOrFail();
            if ($restoran == null) return back()->withErrors('Akun Anda tidak ditemukan.');
            if (Crypt::decryptString($restoran->kata_sandi) !== $request->input('kata_sandi')) return back()->withErrors('Kata sandi Anda salah.');

            Auth::login($restoran);
            $request->session()->regenerate();
            return to_route('beranda')->with('success', 'Berhasil masuk ke akun Anda!');
        } catch (ValidationException $exception) {
            report($exception);
            Log::warning('Akun Anda tidak ditemukan: ' . $exception->getMessage());
            return back()->withErrors('Akun Anda tidak ditemukan.');
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan saat masuk ke akun Anda: ' . $exception->getMessage());
            return back()->withErrors('Terjadi kesalahan saat masuk ke akun Anda.');
        }
    }

    public function register(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'nama_restoran'                     => 'required|string|max:255|unique:restoran',
                'email'                             => 'required|string|email|max:255|unique:restoran',
                'akun_telegram'                     => 'required|string|max:255|unique:restoran',
                'kata_sandi'                        => 'required|string|min:8|confirmed',
            ], [
                'nama_restoran.required'            => 'Nama restoran harus diisi.',
                'email.required'                    => 'Email harus diisi.',
                'email.unique'                      => 'Email sudah terdaftar.',
                'akun_telegram.required'            => 'Akun Telegram harus diisi.',
                'akun_telegram.unique'              => 'Akun Telegram sudah terdaftar.',
                'kata_sandi.min'                    => 'Kata sandi minimal 8 karakter.',
                'kata_sandi.required'               => 'Kata sandi harus diisi.',
                'kata_sandi.confirmed'              => 'Kata sandi tidak cocok.',
            ]);

            Restoran::create([
                'nama_restoran' => $request->input('nama_restoran'),
                'email'         => $request->input('email'),
                'akun_telegram' => $request->input('akun_telegram'),
                'kata_sandi'    => Crypt::encryptString($request->input('kata_sandi')),
            ]);

            DB::commit();
            return to_route('masuk')->with('success', 'Berhasil mendaftarkan akun Anda!');
        } catch (Exception $exception) {
            DB::rollBack();
            report($exception);
            Log::error('Terjadi kesalahan saat mendaftarkan akun Anda: ' . $exception->getMessage());
            return back()->withErrors('Terjadi kesalahan saat mendaftarkan akun Anda.');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return to_route('masuk');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Terjadi kesalahan pada server.');
        }
    }
}