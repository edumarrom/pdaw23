<?php

namespace App\Livewire;

use App\Mail\Teacher\CourseReviewed;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesReviews extends Component
{
    use WithPagination;

    public $course;
    public $rating = 5;
    public $comment = '';

    public function render()
    {
        $reviews = $this->course->reviews()->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.courses-reviews', compact('reviews'));
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

        Mail::to($this->course->teacher->email)->send(new CourseReviewed($this->course));

        $this->reset(['rating', 'comment']);

        $this->course = $this->course->fresh();
    }
}
