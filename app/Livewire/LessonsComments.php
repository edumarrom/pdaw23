<?php

namespace App\Livewire;

use Livewire\Component;

class LessonsComments extends Component
{
    public $lesson;
    public $comment = '';

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.lessons-comments');
    }
}
