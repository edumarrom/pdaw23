<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Comprueba si un alumno se encuentra matriculado en un curso.
     * @return bool
     */
    public function enroll(User $user, Course $course)
    {
        return false;
    }
}
