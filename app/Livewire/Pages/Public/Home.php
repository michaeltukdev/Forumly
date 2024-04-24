<?php

namespace App\Livewire\Pages\Public;

use Livewire\Component;
use App\Models\ForumCategories;

class Home extends Component
{
    public function render()
    {
        $forumCategories = ForumCategories::all()->sortBy('id');

        return view('livewire.pages.public.home', [
            'forumCategories' => $forumCategories
        ])
        ->layout('layouts.app', [
            'title' => 'Home',
        ]);
    }
}
