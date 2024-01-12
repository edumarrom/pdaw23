<?php

namespace App\Livewire\Teacher;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Illuminate\Support\Str;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section;
    public $lesson;
    public $platforms;

    public $title;
    public $slug;
    public $platform_id = 1;
    public $path;

    /* @todo: Crear un nuevo campo en la tabla platforms con la regex */
    public $platformPatterns = [
        1 => '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/',
        2 => '/^(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?)$/mi',
    ];

    protected $rules = [
        'lesson.title' => 'required',
        'lesson.slug' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.path' => 'required',
    ];

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->lesson = new Lesson();
        $this->platforms = Platform::all();

        $this->fill(request()->only('title', 'slug'));
    }

    public function render()
    {
        return view('livewire.teacher.courses-lesson');
    }

    public function storeLesson()
    {
        $pattern = $this->platformPatterns[$this->platform_id];

        $this->validate ([
            'title' => 'required',
            'slug' => 'required',
            'platform_id' => 'required',
            'path' => ['required', 'url', "regex:$pattern"],
        ]);

        // El iframe es manejado por el LessonObserver

        Lesson::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'platform_id' => $this->platform_id,
            'path' => $this->path,
            'section_id' => $this->section->id,
        ]);

        $this->reset([
            'title',
            'slug',
            'platform_id',
            'path'
        ]);

        $this->section = Section::find($this->section->id);
    }

    public function editLesson($id)
    {
        $this->resetValidation();
        $this->lesson = Lesson::find($id);
    }

    public function updateLesson()
    {
        $pattern = $this->platformPatterns[$this->platform_id];

        $this->validate([
            'lesson.title' => 'required',
            'lesson.slug' => 'required',
            'lesson.platform_id' => 'required',
            'lesson.path' => ['required', 'url', "regex:$pattern"],
        ]);

        // El iframe es manejado por el LessonObserver

        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->section = Section::find($this->section->id);
    }

    public function cancelEdit()
    {
        $this->lesson = new Lesson();
    }

    /* public function updatedTitle($value)
    {
        $this->lesson->slug = Str::slug($value);
    } */

    public function updated($propertyName)
    {

        if ($propertyName == 'title') {
            $this->slug = Str::slug($this->title);
        }

        if ($propertyName == 'lesson.title') {
            $this->lesson->slug = Str::slug($this->lesson->title);
        }
    }
}
