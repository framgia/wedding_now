<?php

namespace App\Repositories\Task;

use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function getTasksBySchedule($id, $categoryId)
    {
        return $this->model->with(['timeFrame', 'category'])
            ->when($categoryId != null, function ($query) use ($categoryId) {
               $query->where('category_id', $categoryId);
            })->where('schedule_wedding_id', '=',  $id)->get();
    }
}
