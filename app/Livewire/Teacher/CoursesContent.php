<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

class CoursesContent extends Component
{
    public $course;
    public $section;
    public $title;

    protected $rules = [
        'section.title' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->section = new Section();
    }

    public function render()
    {
        return view('livewire.teacher.courses-content');
    }

    public function storeSection()
    {
        $this->validate([
            'title' => 'required'
        ]);

        $this->course->sections()->create([
            'title' => $this->title
        ]);

        $this->reset('title');

        $this->course = $this->course->fresh();
    }

    public function editSection(Section $section)
    {
        $this->section = $section;
    }

    public function updateSection()
    {
        $this->validate();

        $this->section->save();

        $this->section = new Section();

        $this->course = $this->course->fresh();
    }
}
