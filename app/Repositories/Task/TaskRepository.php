<?php

namespace App\Repositories\Task;

use App\Models\ScheduleWedding;
use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function getTasksBySchedule($id)
    {
        return $this->model->where('schedule_wedding_id', $id)->get();
    }
}
