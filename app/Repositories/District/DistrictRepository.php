<?php

namespace App\Repositories\District;

use App\Repositories\BaseRepository;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInteface
{
    public function getDistrict($keyword)
    {
        $districts = $this->model->with('city')->where('name', 'like', '%' . $keyword . '%')->get();

        return $districts;
    }
}
