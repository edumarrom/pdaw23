<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('requested', $course);
        return view('admin.courses.show', compact('course'));
    }

    public function approve(Course $course)
    {
        if (
            $course->image
            && Str::length($course->description) >= 200
            && $course->goals->count() && $course->goals->count() >= 3
            && $course->requirements->count() && $course->requirements->count() >= 3
            && $course->sections->count() >= 3
            && $course->lessons->count() >= 8
        ) {
            $course->status = Course::PUBLICADO;
            $course->save();

            session()->flash('swal', [
                'icon' => 'success',
                'title' => '¡Hecho!',
                'text' => "Curso '$course->title' publicado satisfactoriamente.",
                'confirmButtonColor' => '#3B82F6',
            ]);
        } else {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => "El curso '$course->title' no cumple los requisitos para ser aprobado.",
                'confirmButtonColor' => '#3B82F6',
            ]);
        };

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
