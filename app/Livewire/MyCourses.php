<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MyCourses extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {

        $courses = User::find(auth()->user()->id)->courses_enrolled()
            ->where('status', 3)
            ->where(function ($query) {
                $query->where('title', 'ILIKE', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('name', 'ILIKE', '%' . $this->search . '%');
                    })
                    ->orWhereHas('level', function ($query) {
                        $query->where('name', 'ILIKE', '%' . $this->search . '%');
                    })
                    ->orWhereHas('teacher', function ($query) {
                        $query->where('name', 'ILIKE', '%' . $this->search . '%');
                    });
            })
            ->orderBy('course_user.created_at', 'desc')
            ->paginate(8);

        return view('livewire.my-courses', compact('courses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
