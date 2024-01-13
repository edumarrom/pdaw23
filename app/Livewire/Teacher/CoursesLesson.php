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
    public $description;

    public $title;
    public $slug;
    public $platform_id = 1;
    public $path;

    protected $rules = [
        'lesson.title' => ['required', 'string', 'max:80'],
        'lesson.slug' => ['required', 'max:255', 'unique:lessons,slug'],
        'lesson.platform_id' => ['required', 'exists:platforms,id'],
        'lesson.path' => ['required', 'url', 'max:255'],
        'lesson.description.description' => ['required', 'string', 'max:500'],
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
        $this->validate ([
            'title' => $this->rules['lesson.title'],
            'slug' => $this->rules['lesson.slug'],
            'platform_id' => $this->rules['lesson.platform_id'],
            //'path' => ['required', 'url', 'regex:' . $this->platformPatterns[$this->platform_id]],
            'path' => ['required', 'url', 'regex:' . Platform::find($this->platform_id)->pattern],
            'description' => $this->rules['lesson.description.description'],
        ]);

        $lesson = $this->section->lessons()->create([
            'title' => $this->title,
            'slug' => $this->slug,
            'platform_id' => $this->platform_id,
            'path' => $this->path,
            'section_id' => $this->section->id,
        ]);

        $lesson->description()->create([
            'description' => $this->description,
        ]);

        $this->reset([
            'title',
            'slug',
            'platform_id',
            'path',
            'description',
        ]);

        $this->section = Section::find($this->section->id);

        /* @todo: Lograr que el formulario se vuelva a cerrar si usamos la alerta  */
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Lección '$lesson->title' creada satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function editLesson($id)
    {
        $this->resetValidation();
        $this->lesson = Lesson::find($id);
        $this->description = $this->lesson->description->description;
    }

    public function updateLesson()
    {
        $lessonTitle = $this->lesson->title;

        $this->rules['lesson.path'] = ['required', 'url', 'regex:' . Platform::find($this->lesson->platform_id)->pattern];
        $this->rules['lesson.slug'] = ['required', 'unique:lessons,slug,' . $this->lesson->id];

        $this->validate();

        $this->lesson->description->save();
        $this->lesson->save();

        $this->lesson = new Lesson();
        $this->section = Section::find($this->section->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Lección '$lessonTitle' editada satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function destroyLesson($id)
    {
        $lesson = Lesson::find($id);

        $lessonTitle = $lesson->title;

        $lesson->delete();

        $this->section = Section::find($this->section->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Lección '$lessonTitle' borrada satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function cancelEdit()
    {
        $this->lesson = new Lesson();
    }

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
