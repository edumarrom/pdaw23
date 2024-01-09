<?php

namespace App\Livewire\Teacher;

use Livewire\Component;

class CoursesContent extends Component
{
    public $course;

    public function mount($course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.teacher.courses-content');
    }
}
