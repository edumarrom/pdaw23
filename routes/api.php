<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses', function () {
    return response()->json(
        App\Models\Course::all()
            ->where('status', '3')
            ->sortByDesc('updated_at')
            ->map(function ($course) {
                return [
                    'title' => $course->title,
                    'slug' => $course->slug,
                    'teacher' => $course->teacher->name,
                    'price' => $course->priceEur,
                    'image' => $course->image ? $course->imagePath : null,
                    'rating' => $course->rating,
                    'students' => $course->students_count,
                    'level' => [
                        'id' => $course->level->id,
                        'name' => $course->level->name,
                    ],
                    'category' => [
                        'id' => $course->category->id,
                        'name' => $course->category->name,
                    ],
                    'created_at' => $course->created_at,
                    'updated_at' => $course->updated_at,
                ];
            })
            ->values()
    );
});
