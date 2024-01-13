<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonObserver
{
    public function creating(Lesson $lesson)
    {
        $lesson->iframe = $this->getVideoIframe($lesson);
    }

    public function updating(Lesson $lesson)
    {
        $lesson->iframe = $this->getVideoIframe($lesson);
    }

    public function deleting(Lesson $lesson)
    {
        if ($lesson->resource) {
            Storage::delete($lesson->resource->path);
            $lesson->resource->delete();
        }
    }

    private function getVideoId(Lesson $lesson)
    {
        $pattern = $lesson->platform->pattern;
        $path = $lesson->path;

        preg_match($pattern, $path, $matches);
        $match = $lesson->platform->match;

        return $matches[$match];
    }

    private function getVideoIframe(Lesson $lesson)
    {
        $iframe = json_decode($lesson->platform->iframe);
        $videoId = $this->getVideoId($lesson);

        return $iframe[0] . $videoId . $iframe[1];
    }
}
