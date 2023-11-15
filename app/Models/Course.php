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
}
