<?php

namespace App\Livewire\Partials\Panels\Tables;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'most_recent';

    public function render()
    {
        $usersQuery = User::when($this->search, function($query) {
            return $query->where('username', 'like', '%' . $this->search . '%');
        });

        $this->sort === 'most_recent' ? $usersQuery->latest() : $usersQuery->oldest();

        $users = $usersQuery->paginate(13);

        return view('livewire.partials.panels.tables.users', compact('users'));
    }
}
