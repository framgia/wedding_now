<?php

namespace App\Repositories\Media;

use App\Models\Media;
use App\Repositories\BaseRepository;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public function saveMediaOfSchedule($schedule, $data)
    {
        $schedule->medias()->create($data);
    }
}
