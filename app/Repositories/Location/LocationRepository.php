<?php

namespace App\Repositories\Location;

use App\Models\Location;
use App\Repositories\Base\BaseRepository;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function __construct(Location $location)
    {
        parent::__construct($location);
    }

    public function createLocationOfSchedule($schedule, $data)
    {
        return $schedule->location()->create($data);
    }

    public function updateLocationOfSchedule($schedule, $data)
    {
        return $schedule->location()->update($data);
    }

    public function getLocationByIdAndType($id, $type)
    {
        return $this->model->where([
            'locationable_id' => $id,
            'locationable_type' => $type,
        ])->get();
    }
}
