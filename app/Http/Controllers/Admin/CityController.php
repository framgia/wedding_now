<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\District\DistrictRepositoryInterface;

class CityController extends Controller
{
    protected $district;

    public function __construct(DistrictRepositoryInterface $district)
    {
        $this->district = $district;
    }
    
    public function getDistrict(Request $request)
    {
        $cityId = $request->id;

        $districts = $this->district->findWithCondition('city_id', $cityId);

        return $districts;
    }
}
