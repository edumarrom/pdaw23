<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        $mostRecentCourses = Course::where('status', 3)
            ->latest('id')
            ->take(8)
            ->get();

        $bestRatedCourses = Course::where('status', 3)
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(8)
            ->get();

        /* @requirement: DWECL - #16 Almacenamiento en el lado del cliente */
        $lastCourseStudied = Course::find(request()->cookie('last_course_studied'));
        $nextLesson = null;

        if (auth()->check() && $lastCourseStudied) {
            foreach ($lastCourseStudied->lessons as $lesson) {
                if (!$lesson->completed) {
                    $nextLesson = $lesson;
                    break;
                } else {
                    $nextLesson = null;
                }
            }
            return view('home', compact('mostRecentCourses', 'bestRatedCourses', 'lastCourseStudied', 'nextLesson'));
        } else {
            return view('home', compact('mostRecentCourses', 'bestRatedCourses', 'lastCourseStudied'));
        }
    }
}
