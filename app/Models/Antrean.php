<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antrean extends Model
{
    protected $table = 'antrean';
    protected $primaryKey = 'id_antrean';
    protected $fillable = ['id_transaksi', 'id_item', 'jumlah', 'subtotal', 'keterangan_pilihan'];
    public $timestamps = true;

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}