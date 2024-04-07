<?php

namespace App\Livewire\Partials\Inputs;

use Livewire\Component;

class Password extends Component
{
    public $password = '';
    public $isConfirmation = false;
    public $label = 'Password';

    public function render()
    {
        return view('livewire.partials.inputs.password');
    }
}
