<?php

declare(strict_types=1);

namespace App\Enums;

enum ItemCategory: string
{
    case KUDAPAN = 'KUDAPAN';
    case MAKANAN = 'MAKANAN';
    case MINUMAN = 'MINUMAN';
}