<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {

        $courses = Course::where('status', 3)
            ->latest('id')
            ->paginate(8);

        $categories = Category::all();

        $levels = Level::all();

        return view('livewire.course-index', compact('courses', 'categories', 'levels'));
    }
}
