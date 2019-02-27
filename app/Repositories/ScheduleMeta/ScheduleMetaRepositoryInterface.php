<?php

namespace App\Repositories\ScheduleMeta;

use App\Repositories\RepositoryInterface;

interface ScheduleMetaRepositoryInterface extends RepositoryInterface
{
    public function updateMeta($scheduleId, $key, $value);
}
