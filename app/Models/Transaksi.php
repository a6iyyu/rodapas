<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $casts = ['status' => Status::class];
    protected $fillable = ['id_restoran', 'kode_transaksi', 'nama_pelanggan', 'tanggal', 'total', 'status'];

    public function antrean(): HasMany
    {
        return $this->hasMany(Antrean::class, 'id_transaksi');
    }

    public function restoran(): BelongsTo
    {
        return $this->belongsTo(Restoran::class, 'id_restoran');
    }
}