<?php

namespace App\Repositories\TimeFrame;

use App\Models\TimeFrame;
use App\Repositories\BaseRepository;

class TimeFrameRepository extends BaseRepository implements TimeFrameRepositoryInterface
{
    public function getDataPluck()
    {
        $timeFrames = TimeFrame::all()->pluck('time_frame', 'id');

        return $timeFrames;
    }
}


