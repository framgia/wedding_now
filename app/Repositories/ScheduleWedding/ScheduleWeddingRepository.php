<?php

namespace App\Repositories\ScheduleWedding;

use App\Models\ScheduleWedding;
use App\Repositories\BaseRepository;
use Auth;

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

    public function getScheduleClient($userId, $scheduleId)
    {
        if ($userId != null) {
            $schedules = ScheduleWedding::where([
                ['schedule_wedding_id', '!=', null],
                ['user_id', '=', $userId],
            ])->get();

            return $schedules;
        }
        $schedule = ScheduleWedding::where([
            ['schedule_wedding_id', '!=', null],
            ['id', '=', $scheduleId],
        ])->first();

        return $schedule;
    }

    public function store($data)
    {
        $data['user_id'] = Auth::id();
        $data['type'] = config('define.type_schedule.custom');
        $data['slug'] = str_slug($data['name']);

        return $this->model->create($data);
    }
}
