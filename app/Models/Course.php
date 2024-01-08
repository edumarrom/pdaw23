<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'status',
        'slug',
        'user_id',
        'level_id',
        'category_id',
        'price_id',
    ];

    protected $withCount = ['students', 'reviews'];

    public const BORRADOR = 1;
    public const REVISION = 2;
    public const PUBLICADO = 3;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* Query Scopes */
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    /* Getters */

    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }

    public function getImagePathAttribute() {
        if($this->image) {
                return Storage::url($this->image->path);
        } else {
            return Storage::url('blank-image.png');
        }
    }

    /**
     * Devuelve el profesor que creó el curso
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Devuelve los estudiantes matriculados en el curso
     */
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
