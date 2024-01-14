<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('title', 'ILIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id)
            ->orderBy('title', 'asc')
            ->paginate(10);

        return view('livewire.teacher.courses-index', compact('courses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
