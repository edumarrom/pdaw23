<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CourseLearn extends Component
{
    use AuthorizesRequests;

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
                /* Si la lección no está, o se trata de la última lección */
                if (!$lesson->completed || $course->lessons->last()->id == $lesson->id) {
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

        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        Cookie::queue('last_course_studied', $this->course->id, 60 * 24 * 30);

        return view('livewire.course-learn');
    }

    public function toggleCompleted()
    {
        if ($this->lesson->completed) {
            $this->lesson->users()->detach(auth()->user()->id);
        } else {
            $this->lesson->users()->attach(auth()->user()->id);
        }
    }

    public function getAdvanceProperty()
    {
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }
        $advance = ($i * 100) / ($this->course->lessons->count());
        return round($advance, 2);
    }
}
