<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TeacherCourses extends Component
{

    public $search;

    public $selected = [];

    public $selectAll = false;

    public function render()
    {
        $courses = Course::where('title', 'ILIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('livewire.teacher-courses', compact('courses'));
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = Course::where('title', 'ILIKE', '%' . $this->search . '%')
                ->where('user_id', auth()->user()->id)
                ->pluck('id')
                ->map(fn ($id) => (string) $id);
        } else {
            $this->selected = [];
        }
    }
}
