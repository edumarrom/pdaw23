<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class LessonsComments extends Component
{
    public $lesson;
    public $comment;

    public $create_body;
    public $body;

    public $rules = [
        'comment.body' => 'required',
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
        $this->comment = new Comment();
    }

    public function render()
    {
        $comments = $this->lesson->comments()->orderBy('created_at', 'desc')->get();
        return view('livewire.lessons-comments', compact('comments'));
    }

    public function store()
    {
        $this->validate([
            'create_body' => 'required',
        ]);

        $this->lesson->comments()->create([
            'body' => $this->create_body,
            'user_id' => auth()->id(),
        ]);

        $this->reset('body');

        $this->lesson = $this->lesson->fresh();
    }

    public function edit(Comment $comment)
    {
        $this->comment = $comment;
        $this->body = $comment->body;
    }

    public function update()
    {
        $this->validate();

        $this->comment->save();

        $this->comment = new Comment();

        $this->lesson = $this->lesson->fresh();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        $this->lesson = $this->lesson->fresh();
    }

    public function cancel()
    {
        $this->comment = new Comment();
    }
}
