<?php

namespace App\Repositories\ScheduleWedding;

use App\Models\ScheduleWedding;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ScheduleMeta;
use App\Repositories\ScheduleMeta\ScheduleMetaRepository;

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
            $schedules = ScheduleWedding::with(['scheduleMetasPluck', 'user', 'user.media', 'imgMain', 'location'])
            ->where([
                ['schedule_wedding_id', '!=', null],
                ['user_id', '=', $userId],
            ])->orWhere([
                ['user_id', '=', $userId],
                ['type', '=', config('define.type_schedule.custom')],
            ])->orderBy('id', 'desc')
                ->withCount('tasks')
                ->get();

            return $schedules;
        }

        $schedule = ScheduleWedding::with(['scheduleMetasPluck', 'user', 'user.media', 'imgMain', 'location'])
            ->where('id', '=', $scheduleId)->first();

        return $schedule;
    }

    public function store($data)
    {
        $data['user_id'] = Auth::id();
        $data['type'] = config('define.type_schedule.custom');
        $data['slug'] = str_slug($data['name']);

        return $this->model->create($data);
    }

    public function getAllScheduleDefault() {
        $schedule = $this->model->withCount('tasks')
                    ->where('type', config('define.type_schedule.default'))
                    ->get();

        return $schedule;
    }
}
