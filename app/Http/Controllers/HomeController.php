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

        $lastCourseStudied = Course::find(request()->cookie('last_course_studied'));

        foreach ($lastCourseStudied->lessons as $lesson) {
            if (!$lesson->completed || $lastCourseStudied->lessons->last()->id == $lesson->id) {
                $nextLesson = $lesson;
                break;
            }
        }

        return view('home', compact('mostRecentCourses', 'bestRatedCourses', 'lastCourseStudied', 'nextLesson'));
    }
}
