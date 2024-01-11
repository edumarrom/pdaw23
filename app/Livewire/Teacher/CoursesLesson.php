<?php

namespace App\Livewire\Teacher;

use App\Models\Lesson;
use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section;
    public $lesson;

    protected $rules = [
        'lesson.title' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.path' => 'required',
    ];

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->lesson = new Lesson();
    }

    public function render()
    {
        return view('livewire.teacher.courses-lesson');
    }

    public function editLesson($id)
    /*
    ¿Por qué da un ArrayToString Exception?
    {
        $this->lesson = $lesson;
    } */
    {
        $this->lesson = Lesson::find($id);
    }
}
