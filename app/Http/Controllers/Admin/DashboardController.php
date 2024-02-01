<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {

        //$pendingCourses = Course::where('status', 2)->count();
        $courses = Course::all();;

        $users = User::all();

        $adminsCount = User::permission([1])->count();

        $teachersCount = User::permission([2])->count();

        $studentsCount = User::whereNotIn('id', User::permission([1, 2])->pluck('id'))->count();

        /* $test = User::permission([2])->get();
        return $test; */

        return view('admin.dashboard', compact('courses', 'users', 'adminsCount', 'teachersCount', 'studentsCount'));
    }
}
