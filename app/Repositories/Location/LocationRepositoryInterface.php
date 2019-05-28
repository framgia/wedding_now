<?php

namespace App\Repositories\Location;

use App\Repositories\Base\RepositoryInterface;

interface LocationRepositoryInterface extends RepositoryInterface
{
    public function createLocationOfSchedule($schedule, $data);

    public function getLocationOfSchedule($schedule);

    public function updateLocationOfSchedule($schedule, $data);
}
