<?php

namespace App\Livewire\Pages\Public;

use Livewire\Component;
use App\Models\Forums as ModelsForums;

class Forums extends Component
{
    public $forum = '';

    public function mount($slug)
    {
        $this->forum = ModelsForums::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pages.public.forums', ['forum' => $this->forum])
            ->layout('layouts.app', [
                'title' => $this->forum->name,
            ]);
    }
}
