<?php

namespace App\Livewire\Teacher;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section;
    public $lesson;
    public $platforms;

    public $title;
    public $platform_id = 1;
    public $path;

    protected $rules = [
        'lesson.title' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.path' => 'required',
    ];

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->lesson = new Lesson();
        $this->platforms = Platform::all();
    }

    public function render()
    {
        return view('livewire.teacher.courses-lesson');
    }

    public function storeLesson()
    {
        switch ($this->platform_id) {
            case 1:
                $pattern = '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/';
                break;

            case 2:
                $pattern = '/^(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?)$/mi';
                break;

            default:
                break;
        }

        $this->validate ([
            'title' => 'required',
            'platform_id' => 'required',
            'path' => ['required', 'url', "regex:$pattern"],
        ]);

        Lesson::create([
            'title' => $this->title,
            'platform_id' => $this->platform_id,
            'path' => $this->path,
            'section_id' => $this->section->id,
        ]);

        $this->reset([
            'title',
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
        switch ($this->lesson->platform_id) {
            case 1:
                $pattern = '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/';
                break;

            case 2:
                $pattern = '/^(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?)$/mi';
                break;

            default:
                break;
        }

        $this->validate([
            'lesson.title' => 'required',
            'lesson.platform_id' => 'required',
            'lesson.path' => ['required', 'url', "regex:$pattern"],
        ]);

        // El iframe es manejado por el LessonObserver
        //$this->lesson->iframe = $iframe[0] . $matches[$match] . $iframe[1];

        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->section = Section::find($this->section->id);
    }

    public function cancelEdit()
    {
        $this->lesson = new Lesson();
    }
}
