<?php

declare(strict_types=1);

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', fn() => $this->comment(Inspiring::quote()))->purpose('Display an inspiring quote');