<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CourseLearn extends Component
{

    public Course $course;
    public Lesson $lesson;
    public $index;
    public $previous;
    public $next;

    public function mount(Course $course, $lesson = null)
    {
        $this->course = $course;

        /* Si llegamos sin el parámetro lesson, buscamos la última lección pendiente del usuario
            y redirigimos a la ruta con el parámetro lesson */
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

        /* Obtenemos el índice de la lección, y su contiguas */
        $this->index = $course->lessons->pluck('id')->search($this->lesson->id);
        $this->previous = $course->lessons[$this->index - 1] ?? null;
        $this->next = $course->lessons[$this->index + 1] ?? null;
    }

    public function render()
    {
        return view('livewire.course-learn');
    }
}
