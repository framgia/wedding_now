<?php

namespace App\Repositories\ScheduleWedding;

use App\Models\ScheduleWedding;
use App\Repositories\BaseRepository;

class ScheduleWeddingRepository extends BaseRepository implements ScheduleWeddingRepositoryInterface
{
    public function deleteTasks($data = [])
    {
        $this->model->destroy($data);
    }

    public function getScheduleWeddingDefault()
    {
    	$scheduleWedding = ScheduleWedding::with([
            'tasks.category' => function ($query) {
                $query->get();
            },
            'tasks.timeFrame' => function ($query) {
                $query->get();
            },
        ])->withCount('tasks')->where('type', '=', config('define.type_schedule.default'))->first();

        return $scheduleWedding;
    }
}
