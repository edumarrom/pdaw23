<?php

namespace App\Observers;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    public function deleting(Section $section)
    {
        $section->lessons->each(function ($lesson) {
            if ($lesson->resource) {
                Storage::delete($lesson->resource->path);
                $lesson->resource->delete();
            }
        });
    }
}
