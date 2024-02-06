<?php

namespace App\Http\Controllers;

use App\Mail\CoursePurchased;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        return view('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $this->authorize('published', $course);

        return view('courses.show', compact('course'));
    }

    public function enroll(Course $course) {
        $course->students()->sync(auth()->user()->id);

        // Mail::to(auth()->user()->email)->send(new CoursePurchased($course));

        return redirect()->route('courses.learn', $course);
    }
}
