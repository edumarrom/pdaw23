<?php

namespace App\Livewire;

use Livewire\Component;

class CoursesReviews extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.courses-reviews');
    }
}
