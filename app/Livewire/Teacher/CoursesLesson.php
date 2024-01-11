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

    public function editLesson($id)
    {
        $this->lesson = Lesson::find($id);
    }

    public function updateLesson()
    {
        switch ($this->lesson->platform_id) {
            case 1:
                $pattern = '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/';
                preg_match($pattern, $this->lesson->path, $matches);
                $match = 5;
                $iframe = [
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/',
                    '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                ];

                break;
            case 2:
                $pattern = '/^(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?)$/mi';
                preg_match($pattern, $this->lesson->path, $matches);
                $match = 4;
                $iframe = [
                    '<iframe src="https://player.vimeo.com/video/',
                    '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
                ];
                break;
            default:
                /* $lessonPath = [
                    'required',
                    'url',
                ]; */
                break;
        }

        // dd($matches, $iframe, $pattern);
        // Youtube: matches[5] | Vimeo: matches[4]

        $this->validate([
            'lesson.title' => 'required',
            'lesson.platform_id' => 'required',
            'lesson.path' => ['required', 'url', "regex:$pattern"],
        ]);

        $this->lesson->iframe = $iframe[0] . $matches[$match] . $iframe[1];

        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->section = Section::find($this->section->id);
    }

    public function cancelEdit()
    {
        $this->lesson = new Lesson();
    }
}
