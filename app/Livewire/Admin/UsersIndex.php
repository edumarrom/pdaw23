<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        /* $users = User::where('name', 'ILIKE', '%' . $this->search . '%')
            ->orWhere('email', 'ILIKE', '%' . $this->search . '%')
            ->orWhereHas('roles', function ($query) {
                $query->where('name', 'ILIKE', '%' . $this->search . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(); */

            $users = User::where(function ($query) {
                $query->where('name', 'ILIKE', '%' . $this->search . '%')
                ->orWhere('email', 'ILIKE', '%' . $this->search . '%')
                ->orWhereHas('roles', function ($query) {
                    $query->where('name', 'ILIKE', '%' . $this->search . '%');
                });
            })
            ->orderBy('id', 'asc')
            ->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
