<?php

namespace App\View\Components\fields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownField extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $name;
    public $id;
    public $options;

    public function __construct($label, $name, $id = null, $options = [])
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.dropdown-field');
    }
}
