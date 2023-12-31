<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Relaciones Eloquent

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
