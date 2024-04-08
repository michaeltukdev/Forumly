<?php

namespace App\View\Components\Partials\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Primary extends Component
{
    public function __construct(
        public string $type = 'text',
        public string $label = '',
        public string $svg = 'heroicon-o-question-mark-circle',
        public string $placeholder = 'test',
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.partials.inputs.primary');
    }
}
