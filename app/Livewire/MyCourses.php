<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MyCourses extends Component
{
    public function render()
    {

        $courses = User::find(auth()->user()->id)->courses_enrolled()->paginate(4);

        return view('livewire.my-courses', compact('courses'));
    }
}
