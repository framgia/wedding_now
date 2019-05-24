<?php

namespace App\Repositories\City;

use App\Models\City;
use App\Repositories\Base\BaseRepository;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $city)
    {
        parent::__construct($city);
    }
}
