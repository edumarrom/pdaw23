<?php

namespace App\Policies;

use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    /**
     * Comprueba si un usuario es el autor de un comentario.
     * @return bool
     */
    public function author(User $user, $comment)
    {
        return $user->id == $comment->user_id;
    }
}
