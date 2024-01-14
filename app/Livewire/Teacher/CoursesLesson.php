<?php

namespace App\Livewire\Teacher;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CoursesLesson extends Component
{
    use WithFileUploads;

    public $section;
    public $lesson;
    public $platforms;
    public $description;
    public $resource;

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
        'resource' => ['nullable', 'file', 'max:20480'], // 20MB
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
        $lessons = $this->section->lessons()->orderBy('created_at', 'asc')->orderBy('id', 'asc')->get();
        return view('livewire.teacher.courses-lesson', compact('lessons'));
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

    public function storeLesson()
    {
        $this->validate ([
            'title' => $this->rules['lesson.title'],
            'slug' => $this->rules['lesson.slug'],
            'platform_id' => $this->rules['lesson.platform_id'],
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

        if ($this->resource) {
            $fileName = time() . '_' . $this->resource->getClientOriginalName();

            $lesson->resource()->create([
                    'path' => $this->resource->storeAs('resources', $fileName),
                ]);
        }

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

        if ($this->resource) {
            $fileName = time() . '_' . $this->resource->getClientOriginalName();

            // Si la lección tiene un recurso, se actualiza, en caso contrario se crea
            if ($this->lesson->resource) {
                Storage::delete($this->lesson->resource->path);

                $this->lesson->resource->update([
                    'path' => $this->resource->storeAs('resources', $fileName),
                ]);
            } else {
                $this->lesson->resource()->create([
                    'path' => $this->resource->storeAs('resources', $fileName),
                ]);
            }
        }

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

    // Al estar dentro del formulario, no necesito pasarle el id de la lección
    public function destroyResource()
    {
        Storage::delete($this->lesson->resource->path);

        $this->lesson->resource->delete();

        $this->section = Section::find($this->section->id);
    }

    // ¿Por qué si se llama fuera del formulario, se debe pasar el id de la lección?
    public function downloadResource($id)
    {
        $lesson = Lesson::find($id);

        return response()->download(storage_path('app/public/' . $lesson->resource->path));
    }

    public function cancelEdit()
    {
        $this->lesson = new Lesson();
    }
}
