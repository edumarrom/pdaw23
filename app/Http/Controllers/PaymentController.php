<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Course $course)
    {
        return view('payment.checkout', compact ('course'));
    }

    public function purchase(Request $request, Course $course)
    {
        $request->validate([
            'acceptance' => 'required',
        ]);

        $course->students()->sync(auth()->user()->id);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Enhorabuena!',
            'text' => "Tu compra del curso '$course->title' se ha realizado con éxito.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('courses.show', $course);
    }
}
