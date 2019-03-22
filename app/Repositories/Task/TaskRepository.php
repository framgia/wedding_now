<?php

namespace App\Repositories\Task;

use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function getTasksBySchedule($id, $categoryId, $status = null)
    {
        return $this->model->with(['timeFrame', 'category'])
            ->when($categoryId != null, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($status != null, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->where('schedule_wedding_id', '=',  $id)
            ->get();
    }
}
