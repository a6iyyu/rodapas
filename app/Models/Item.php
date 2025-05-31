<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id_item';

    public function antrean(): HasMany
    {
        return $this->hasMany(Antrean::class, 'id_item', 'id_item');
    }
}