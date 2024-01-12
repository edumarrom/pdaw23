<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    public $platformData = [
        1 => [
            'pattern' => '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/',
            'match' => 5,
            'iframe' => [
                '<iframe width="560" height="315" src="https://www.youtube.com/embed/',
                '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            ],
        ],
        2 => [
            'pattern' => '/^(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?)$/mi',
            'match' => 4,
            'iframe' => [
                '<iframe src="https://player.vimeo.com/video/',
                '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
            ],
        ],
    ];

    public function updating(Lesson $lesson)
    {
        $path = $lesson->path;
        $platformId = $lesson->platform_id;

        switch ($platformId) {
            case 1:
                $iframe = $this->getVideoIframe($path, $platformId);
                break;

            case 2:
                $iframe = $this->getVideoIframe($path, $platformId);
                break;

            default:
                break;
        }

        $lesson->iframe = $iframe;
    }

    private function getVideoId($path, $platformId)
    {
        $pattern = $this->platformData[$platformId]['pattern'];
        preg_match($pattern, $path, $matches);
        $match = $this->platformData[$platformId]['match'];

        return $matches[$match];
    }


    private function getVideoIframe($path, $platformId)
    {
        $iframe = $this->platformData[$platformId]['iframe'];
        $videoId = $this->getVideoId($path, $platformId);

        return $iframe[0] . $videoId . $iframe[1];
    }
}
