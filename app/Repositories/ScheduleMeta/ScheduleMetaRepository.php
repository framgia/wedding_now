<?php

namespace App\Repositories\ScheduleMeta;

use App\Models\ScheduleMeta;
use App\Repositories\BaseRepository;

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
            'value' => $value
        ]);
    }

    public function updateMetas($scheduleId, $keyValues)
    {
        foreach ($keyValues as $key => $value) {
            $this->updateMeta($scheduleId, $key, $value);

        }
    }
}
