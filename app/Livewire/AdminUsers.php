<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::paginate();

        return view('livewire.admin-users', compact('users'));
    }
}
