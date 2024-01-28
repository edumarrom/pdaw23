<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectedCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
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

            Mail::to($course->teacher->email)->send(new ApprovedCourse($course));

            session()->flash('swal', $this->getSwalSuccess("El curso '$course->title' ha sido publicado satisfactoriamente."));
        } else {
            session()->flash('swal', $this->getSwalError("El curso '$course->title' no cumple los requisitos para ser aprobado."));
        };

        return redirect()->route('admin.courses.index');
    }

    public function reject(Course $course)
    {
        $course->status = Course::BORRADOR;
        $course->save();

        Mail::to($course->teacher->email)->send(new RejectedCourse($course));

        session()->flash('swal', $this->getSwalSuccess("Curso '$course->title' rechazado satisfactoriamente."));

        return redirect()->route('admin.courses.index');
    }

    private function getSwalSuccess($text = '')
    {
        return [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => $text,
            'confirmButtonText' => 'Aceptar',
            'confirmButtonColor' => '#3B82F6',
        ];
    }

    private function getSwalError($text = '')
    {
        return [
            'icon' => 'error',
            'iconColor' => '#f43f5e',
            'title' => "D'oh!",
            'text' => $text,
            'confirmButtonText' => 'Aceptar',
            'confirmButtonColor' => '#3B82F6',
        ];
    }
}
