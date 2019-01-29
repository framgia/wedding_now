<?php

namespace App\Repositories\ScheduleWedding;

use App\Repositories\BaseRepository;

class ScheduleWeddingRepository extends BaseRepository implements ScheduleWeddingRepositoryInterface
{
    public function deleteTasks($data = [])
    {
        $this->model->destroy($data);
    }
}
