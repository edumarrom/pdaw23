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
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    /**
     * Comprueba si un curso está publicado.
     * @return bool
     */
    public function published(?User $user, Course $course)
    {
        return $course->status == 3;
    }

    /**
     * Comprueba si un usuario es el autor de un curso.
     * @return bool
     */
    public function delivered(User $user, Course $course)
    {
        return $course->user_id == $user->id;
    }
}
