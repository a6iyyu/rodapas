<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Restoran extends User
{
    use HasFactory;

    protected $table = 'restoran';
    protected $primaryKey = 'id_restoran';
    protected $fillable = ['nama_restoran', 'email', 'kata_sandi', 'logo', 'alamat', 'nomor_telepon', 'akun_telegram'];
    protected $hidden = ['kata_sandi'];

    public function getAuthPassword(): mixed
    {
        return decrypt($this->kata_sandi);
    }
}