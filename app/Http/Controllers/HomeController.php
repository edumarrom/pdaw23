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

        return view('home', compact('mostRecentCourses', 'bestRatedCourses'));
    }
}
