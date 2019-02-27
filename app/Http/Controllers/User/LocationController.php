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

    public function getDistrict($keyword)
    {
        return $this->district->getDistrict($keyword);
    }
}
