<?php

namespace App\Livewire;

use Livewire\Component;

class LessonsComments extends Component
{
    public $lesson;
    public $comment = '';

    public $rules = [
        'comment' => 'required|',
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.lessons-comments');
    }

    public function store()
    {
        $this->validate();

        $this->lesson->comments()->create([
            'body' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        $this->reset('comment');

        $this->lesson = $this->lesson->fresh();
    }
}
