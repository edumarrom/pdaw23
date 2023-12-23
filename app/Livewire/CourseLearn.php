<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CourseLearn extends Component
{

    public Course $course;
    public Lesson $lesson;

    public function mount(Course $course, $lesson = null)
    {
        $this->course = $course;

        if ($lesson) {
            $this->lesson = $lesson;
        } else {
            foreach ($course->lessons as $lesson) {
                if (!$lesson->completed) {
                    $this->lesson = $lesson;
                    break;
                }
            }
            redirect()->route('courses.learn', [$this->course, $this->lesson]);
        }
    }

    public function render()
    {
        return view('livewire.course-learn');
    }
}
