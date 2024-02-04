<?php

namespace App\Livewire;

use App\Mail\Teacher\CourseReviewed;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesReviews extends Component
{
    use WithPagination;

    public $course;
    public $review;

    public $create_rating = 5;
    public $create_comment;
    public $rating;
    public $comment;

    public $rules = [
        'review.rating' => 'required|numeric|min:1|max:5',
        'review.comment' => 'required|min:10',
    ];

    public function mount($course)
    {
        $this->course = $course;
        $this->review = new Review();
    }

    public function render()
    {
        $reviews = $this->course->reviews()->orderBy('created_at', 'desc')->get();
        return view('livewire.courses-reviews', compact('reviews'));
    }

    public function store()
    {
        $this->validate([
            'create_comment' => 'required|min:10',
        ]);

        $this->course->reviews()->create([
            'rating' => $this->create_rating,
            'comment' => $this->create_comment,
            'user_id' => auth()->id(),
        ]);

        Mail::to($this->course->teacher->email)->send(new CourseReviewed($this->course));

        $this->reset(['create_rating', 'create_comment']);

        $this->course = $this->course->fresh();
    }

    public function edit(Review $review)
    {
        $this->review = $review;
        $this->rating = $review->rating;
        $this->comment = $review->comment;
    }

    public function update()
    {
        $this->validate();

        $this->review->save();

        $this->review = new Review();

        $this->course = $this->course->fresh();
    }

    public function destroy(Review $review)
    {
        $review->delete();

        $this->course = $this->course->fresh();
    }

    public function cancel()
    {
        $this->review = new Review();
    }
}
