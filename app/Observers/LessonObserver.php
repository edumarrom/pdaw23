<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    public function creating(Lesson $lesson)
    {
        $path = $lesson->path;
        $platformId = $lesson->platform_id;

        $lesson->iframe = $this->getVideoIframe($path, $platformId);
    }

    public function updating(Lesson $lesson)
    {
        $path = $lesson->path;
        $platformId = $lesson->platform_id;

        $lesson->iframe = $this->getVideoIframe($lesson);
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
