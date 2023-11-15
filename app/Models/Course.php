<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public const BORRADOR = 1;
    public const REVISION = 2;
    public const PUBLICADO = 3;

    /**
     * Devuelve el profesor que creó el curso
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Devuelve los estudiantes matridulados en el curso
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
