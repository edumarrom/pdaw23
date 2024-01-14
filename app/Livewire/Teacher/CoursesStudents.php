<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use App\Models\User;
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
        $students = $this->course->students;
        return view('livewire.teacher.courses-students', compact('students'));
    }
}
