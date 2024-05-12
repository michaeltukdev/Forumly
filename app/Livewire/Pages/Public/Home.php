<?php

namespace App\Livewire\Pages\Public;

use Livewire\Component;
use App\Models\ForumCategories;
use Illuminate\Database\Eloquent\Collection;

class Home extends Component
{
    public Collection $forumCategories;

    public function mount()
    {
        $this->forumCategories = ForumCategories::select('id', 'name', 'summary')->get();
    }

    public function render()
    {
        return view('livewire.pages.public.home')
        ->layout('layouts.app', [
            'title' => 'Home',
        ]);
    }
}
