<?php

namespace App\Repositories\ScheduleWedding;

use App\Models\ScheduleWedding;

class ScheduleWeddingRepository implements ScheduleWeddingRepositoryInterface
{
    public function model()
    {
        return new ScheduleWedding;
    }
}
