<?php

namespace App\View\Components\fields;

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

    public function __construct($label, $name, $id = null, $type = 'text', $value = null, $placeholder = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id ?: null;
        $this->type = $type ?: 'text';
        $this->value = $value ?? old($name);
        $this->placeholder = $placeholder ?? $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.fields.input-field');
    }
}
