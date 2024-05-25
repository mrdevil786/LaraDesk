<?php

namespace App\View\Components\Fields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public $label;
    public $name;
    public $id;
    public $type;
    public $value;
    public $placeholder;
    public $class;

    public function __construct($label, $name, $id = null, $type = 'text', $value = null, $placeholder = null, $class = 'col-xl-12 mb-3')
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id ?: null;
        $this->type = $type ?? 'text';
        $this->value = $value ?? old($name);
        $this->placeholder = $placeholder ?? $label;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('Components.Fields.Input-Field');
    }
}
