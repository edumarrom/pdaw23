<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teacher.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('teacher.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('teacher.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        return $course;
    }
}
