<?php

namespace App\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RightOffcanvas extends Component
{
    public string $title;
    public string $action;
    public string $method;
    public string $id;

    public function __construct(string $title, string $action, string $method = 'POST', string $id = 'offcanvasRight')
    {
        $this->title = $title;
        $this->action = $action;
        $this->method = $method;
        $this->id = $id;
    }

    public function render(): View|Closure|string
    {
        return view('Components.Modal.Right-Offcanvas');
    }
}
