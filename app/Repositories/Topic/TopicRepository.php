<?php

namespace App\Repositories\Topic;

use App\Models\Topic;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;

class TopicRepository extends BaseRepository implements TopicRepositoryInterface
{
    public function checkImageCollection($collection, $basePath, $pathDefault)
    {
        $newCollection = $collection->transform(function($item) use ($basePath, $pathDefault) {

            if ($item->media) {

                if (File::exists($basePath . $item->media->name)) {

                    $item->image = $item->media->name;
                } else {

                    $item->image = $pathDefault;
                }

            } else {

                $item->image = $pathDefault;
            }

            return $item;
        });

        return $newCollection;
    }
}
