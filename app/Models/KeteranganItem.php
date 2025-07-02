<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeteranganItem extends Model
{
    use HasFactory;

    protected $table = 'keterangan_item';
    protected $primaryKey = 'id_keterangan_item';
    protected $fillable = ['id_item', 'nama_keterangan', 'pilihan', 'wajib'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}