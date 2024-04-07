<?php

namespace App\Livewire\Partials\Inputs;

use Livewire\Component;

class Primary extends Component
{
    public $label = '';
    public $svg =  '';
    public $type = 'text';
    public $placeholder = '';

    public function render()
    {
        return view('livewire.partials.inputs.primary');
    }
}
