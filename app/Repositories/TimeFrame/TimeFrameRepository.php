<?php

namespace App\Repositories\TimeFrame;

use App\Models\TimeFrame;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TimeFrameRepository extends BaseRepository implements TimeFrameRepositoryInterface
{
    public function __construct(TimeFrame $timeFrame)
    {
        parent::__construct($timeFrame);
    }

    public function getDataPluck()
    {
        $timeFrames = $this->model->all()->pluck('time_frame', 'id');

        return $timeFrames;
    }
}


