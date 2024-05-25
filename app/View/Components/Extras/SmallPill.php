<?php

namespace App\View\Components\Extras;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallPill extends Component
{
    public $pillColor;

    public $pillText;

    public function __construct($pillColor = 'default', $pillText = 'Add Text',)
    {
        $this->pillColor = $pillColor;
        $this->pillText = $pillText;
    }

    public function render(): View|Closure|string
    {
        return view('Components.Extras.Small-Pill');
    }
}
