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

    public function approve(Course $course)
    {
        $course->status = Course::PUBLICADO;
        $course->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Curso '$course->title' publicado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.courses.index');
    }

    public function reject(Course $course)
    {
        $course->status = Course::BORRADOR;
        $course->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Curso '$course->title' rechazado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.courses.index');
    }
}
