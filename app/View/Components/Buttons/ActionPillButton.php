<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionPillButton extends Component
{
    public $href;

    public $iconClass;

    public $iconColor;

    public function __construct($href = '#', $iconClass = 'fa fa-thumbs-up', $iconColor = 'default')
    {
        $this->href = $href;
        $this->iconClass = $iconClass;
        $this->iconColor = $iconColor;
    }

    public function render(): View|Closure|string
    {
        return view('components.buttons.action-pill-button');
    }
}
