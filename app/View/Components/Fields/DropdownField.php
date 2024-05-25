<?php

namespace App\View\Components\Fields;

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
    public $class;
    public $selected;
    
    public function __construct($label, $name, $id = null, $options = [], $class = 'col-xl-12 mb-3', $selected = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
        $this->class = $class;
        $this->selected = $selected;
    }    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('Components.Fields.Dropdown-Field');
    }
}
