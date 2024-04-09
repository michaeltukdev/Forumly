<?php

namespace App\View\Components\Partials\Panel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Widget extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title, public string $icon, public string $color, public string $value)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.panel.widget');
    }
}
