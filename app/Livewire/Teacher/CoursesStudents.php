<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;

class CoursesStudents extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.teacher.courses-students');
    }
}
