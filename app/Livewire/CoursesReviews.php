<?php

namespace App\Livewire;

use Livewire\Component;

class CoursesReviews extends Component
{
    public $course;
    public $rating = 5;
    public $comment = '';

    public function render()
    {
        return view('livewire.courses-reviews');
    }

    public function store()
    {
        $this->validate([
            'comment' => 'required|min:10',
        ]);

        $this->course->reviews()->create([
            'rating' => $this->rating,
            'comment' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        $this->reset(['rating', 'comment']);

        $this->course = $this->course->fresh();
    }
}
