<?php

namespace App\Repositories\ScheduleMeta;

use App\Models\ScheduleMeta;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ScheduleMetaRepository extends BaseRepository implements ScheduleMetaRepositoryInterface
{
    private $schedule;

    public function __construct(ScheduleMeta $scheduleMeta, ScheduleRepositoryInterface $schedule)
    {
        parent::__construct($scheduleMeta);

        $this->schedule = $schedule;
    }

    public function updateMeta($scheduleId, $key, $value)
    {
        $this->model->updateOrCreate([
            ['schedule_id', '=', $scheduleId],
            ['key', '=', $key],
        ], [
            'schedule_id' => $scheduleId,
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
}
