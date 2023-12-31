<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $users = User::where('name', 'ILIKE', '%' . $this->search . '%')
            ->orWhere('email', 'ILIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin-users', compact('users'));
    }
}
