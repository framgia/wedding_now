<?php

namespace App\Repositories\District;

use App\Models\District;
use App\Repositories\Base\BaseRepository;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    public function __construct(District $district)
    {
        parent::__construct($district);
    }

    public function getDistrict($keyword)
    {
        $districts = $this->model->with('city')->where('name', 'like', '%' . $keyword . '%')->get();

        return $districts;
    }
}
