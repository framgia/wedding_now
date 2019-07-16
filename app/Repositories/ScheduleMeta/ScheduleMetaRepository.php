<?php

namespace App\Repositories\ScheduleMeta;

use App\Models\ScheduleMeta;
use App\Repositories\Base\BaseRepository;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ScheduleMetaRepository extends BaseRepository implements ScheduleMetaRepositoryInterface
{
    private $schedule;

    public function __construct(ScheduleMeta $scheduleMeta, ScheduleWeddingRepositoryInterface $schedule)
    {
        parent::__construct($scheduleMeta);
        $this->schedule = $schedule;
    }

    public function updateMeta($scheduleId, $key, $value)
    {
        $this->model->updateOrCreate([
            ['schedule_wedding_id', '=', $scheduleId],
            ['key', '=', $key],
        ], [
            'schedule_wedding_id' => $scheduleId,
            'key' => $key,
            'value' => $value,
        ]);
    }

    public function updateMetas($scheduleId, $keyValues)
    {
        foreach ($keyValues as $key => $value) {
            $this->updateMeta($scheduleId, $key, $value);
        }
    }

    public function getChosenSchedule()
    {
        $schedule = $this->schedule->getSchedule(Auth::id(), '', config('define.type_schedule.custom'))
            ->sortByDesc('updated_at')
            ->first();

        $choosenSchedule = $this->model->with('scheduleWedding')
                ->whereHas('scheduleWedding.user', function ($query) {
                    $query->where('users.id', Auth::id());
                })->where('key', config('define.default'))
                ->first() ?? $this->model->create([
                'schedule_wedding_id' => $schedule->id,
                'key' => config('define.default'),
                'value' => config('define.default'),
            ]);

        return $choosenSchedule;
    }

    public function setChosenSchedule($scheduleId)
    {
        $chosenSchedule = $this->getChosenSchedule();

        $this->model->updateOrCreate([
            'id' => isset($chosenSchedule) ? $chosenSchedule->id : null,
        ], [
            'schedule_wedding_id' => $scheduleId,
            'key' => config('define.default'),
            'value' => config('define.default'),
        ]);
    }
}
