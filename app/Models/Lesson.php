<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'path',
        'iframe',
        'platform_id',
        'section_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Devuelve true si la lección actual está completada, false en caso contrario.
     */
    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(User::class, 'likeable');
    }
}
