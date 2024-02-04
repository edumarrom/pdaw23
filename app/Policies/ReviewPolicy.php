<?php

namespace App\Policies;

use App\Models\User;

class ReviewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Comprueba si un usuario es el autor de una valoración.
     * @return bool
     */
    public function author(User $user, $review)
    {
        return $user->id == $review->user_id;
    }
}
