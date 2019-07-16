<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Repositories\District\DistrictRepository;

class LocationController extends Controller
{
    protected $district;

    public function __construct(District $district)
    {
        $this->district = new DistrictRepository($district);
    }

    public function searchLocation($keyword)
    {
        return $this->district->searchLocation($keyword);
    }

    public function getDistrictsById($id)
    {
        return $this->district->findWithCondition('city_id', $id)->pluck('name', 'id');
    }
}
