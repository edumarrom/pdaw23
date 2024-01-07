<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Image;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $categories = Category::all();
        $levels = Level::all();
        $prices = Price::all();

        return view('teacher.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // return $request->all();

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'price_id' => 'required|exists:prices,id',
            'image' => 'nullable|image',
        ]);

        if ($request->file('image')) {

            // Eliminar imagen anterior
            if ($course->image) {
                Storage::delete($course->image->path);
            }

            // Actualizar relación polimórfica de la imagen
            $path = Storage::put('courses', $request->image);
            $course->image->update([
                'path' => $path,
            ]);
        }

        $course->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Curso '$course->title' editado satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);

        return redirect()->route('teacher.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        return $course;
    }
}
