<?php

namespace App\Repositories\Task;

use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function getTasksBySchedule($id)
    {
        return $this->model->with(['timeFrame', 'category'])->where('schedule_wedding_id', $id)->get();
    }
}
