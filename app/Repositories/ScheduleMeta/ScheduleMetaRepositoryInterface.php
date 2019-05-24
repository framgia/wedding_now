<?php

namespace App\Repositories\ScheduleMeta;

use App\Repositories\Base\RepositoryInterface;

interface ScheduleMetaRepositoryInterface extends RepositoryInterface
{
    public function updateMeta($scheduleId, $key, $value);

    public function updateMetas($scheduleId, $keyValues);

    public function getChosenSchedule();

    public function setChosenSchedule($scheduleId);
}
