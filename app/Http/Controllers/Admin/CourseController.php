<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.courses.index');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }
}
