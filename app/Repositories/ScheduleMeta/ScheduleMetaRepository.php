<?php

namespace App\Repositories\ScheduleMeta;

use App\Models\ScheduleMeta;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ScheduleMetaRepository extends BaseRepository implements ScheduleMetaRepositoryInterface
{
    public function updateMeta($scheduleId, $key, $value)
    {
        ScheduleMeta::updateOrCreate([
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
        return $this->model->with('scheduleWedding')
            ->whereHas('scheduleWedding.user', function ($query) {
                $query->where('users.id', Auth::id());
            })->where('key', config('define.default'))->first();
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
