<?php

namespace App\Livewire\Partials\Panel;

use Livewire\Component;

class SidebarDropdown extends Component
{
    public $label, $icon, $items;

    public function mount($label, $icon, array $items)
    {
        $this->label = $label;
        $this->icon = $icon;
        $this->items = $items;
    }
    
    public function render()
    {
        return view('livewire.partials.panel.sidebar-dropdown');
    }
}
