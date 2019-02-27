<?php

namespace App\Repositories\Location;

use App\Models\Location;
use App\Repositories\BaseRepository;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function createLocationOfSchedule($schedule, $data)
    {
        $schedule->location()->create($data);
    }

    public function getLocationOfSchedule($schedule)
    {
        $result = Location::where('locationable_id', '=', $schedule->id)->first();

        return $result;
    }

    public function updateLocationOfSchedule($schedule, $data)
    {
        $schedule->location()->update($data);
    }
}
