<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;

    public $course;
    public $search;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $students = $this->course->students()->where('name', 'ILIKE', '%' . $this->search . '%')
            ->orWhere('email', 'ILIKE', '%' . $this->search . '%')
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('livewire.teacher.courses-students', compact('students'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
