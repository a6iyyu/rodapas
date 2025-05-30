<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public string $image, $name, $price;

    public function __construct(string $image, string $name, string $price)
    {
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
    }

    public function price(): string
    {
        return 'Rp' . number_format((int) $this->price, 0, ',', '.');
    }

    public function render(): View|Closure|string
    {
        return view('shared.card');
    }
}