<?php

namespace App\Livewire\Partials\Panel;

use Livewire\Component;

class Breadcrumbs extends Component
{   
    public array $path;

    public function mount($path)
    {
        $this->path = $path;
    }

    public function render()
    {
        return view('livewire.partials.panel.breadcrumbs');
    }
}
