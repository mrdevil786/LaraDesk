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
    public $modalTarget;

    public function __construct($href = null, $iconClass = 'fa fa-thumbs-up', $iconColor = 'default', $modalTarget = '')
    {
        $this->href = $href;
        $this->iconClass = $iconClass;
        $this->iconColor = $iconColor;
        $this->modalTarget = $modalTarget;
    }

    public function render(): View|Closure|string
    {
        return view('Components.Buttons.Action-Pill-Button');
    }
}
