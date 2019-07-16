<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Base\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }

    public function getTasksBySchedule($id, $categoryId = null, $status = null, $orderByDate = null, $orderByPriority = null)
    {
        return $this->model->with(['timeFrame', 'category'])
            ->when($categoryId != null, function ($query) use ($categoryId) {
                $query->whereIn('category_id', $categoryId);
            })
            ->when($status != null, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($orderByDate != null, function ($query) use ($orderByDate) {
                $query->when($orderByDate === config('define.orderByDateUnflow'), function ($query) {
                    $query->orderBy('time_occurs', 'desc');
                }, function ($query) {
                    $query->orderBy('time_occurs', 'asc');
                });
            }, function ($query) {
                $query->get();
            })
            ->when($orderByPriority != null, function ($query) use ($orderByPriority) {
                $query->when($orderByPriority === config('define.priority.low'), function ($query) {
                    $query->orderBy('priority', 'asc');
                }, function ($query) {
                    $query->orderBy('priority', 'desc');
                });
            }, function ($query) {
                $query->get();
            })
            ->where('schedule_id', '=', $id)
            ->get();
    }
}
