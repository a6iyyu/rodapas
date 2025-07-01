<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Restoran extends User
{
    protected $table = 'restoran';
    protected $primaryKey = 'id_restoran';
    protected $fillable = ['nama_restoran', 'email', 'kata_sandi', 'logo', 'alamat', 'nomor_telepon', 'akun_telegram'];
}