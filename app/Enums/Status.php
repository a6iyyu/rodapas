<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    case MENUNGGU = 'MENUNGGU';
    case DIPROSES = 'DIPROSES';
    case SELESAI = 'SELESAI';
    case BATAL = 'BATAL';
}