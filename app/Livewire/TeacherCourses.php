<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TeacherCourses extends Component
{

    public $search;

    public function render()
    {

        $courses = Course::where('title', 'ILIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('livewire.teacher-courses', compact('courses'));
    }
}
