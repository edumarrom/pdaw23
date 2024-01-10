<?php

namespace App\Livewire\Teacher;

use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section;

    public function mount(Section $section)
    {
        $this->section = $section;
    }

    public function render()
    {
        return view('livewire.teacher.courses-lesson');
    }
}
