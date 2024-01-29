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

        $pendingCourses = Course::where('status', 2)->count();

        $users = User::count();

        return view('admin.dashboard', compact('pendingCourses', 'users'));
    }
}
