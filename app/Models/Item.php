<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'item';
    protected $primaryKey = 'id_item';

    public function antrean(): HasMany
    {
        return $this->hasMany(Antrean::class, 'id_item', 'id_item');
    }

    public function keterangan_item(): HasMany
    {
        return $this->hasMany(KeteranganItem::class, 'id_item');
    }
}