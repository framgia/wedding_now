<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\ScheduleWedding;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RealWeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->getCities();
        $maxCost = $this->getMaxCost();
        $data = $this->filter([0, $maxCost], null);

        return view('user.real_wedding', compact('data', 'cities', 'maxCost'));
    }

    public function filter($cost, $city)
    {
        $data = ScheduleWedding::where('final_cost', '>', 0)
            ->where('final_cost', '>=', $cost[0])
            ->where('final_cost', '<=', $cost[1])
            ->with('scheduleMetasPluck', 'medias')
            ->when($city, function($q) use ($city) {
                $q->whereHas('location.district.city', function($query) use ($city) {
                    $query->where('id', $city);
                });
            }, function($get) {
                $get->get();
            })
            ->withCount('tasks')
            ->paginate(config('define.paginate'));

        return $data;
    }

    public function getCities()
    {
        return City::get();
    }

    public function getMaxCost()
    {
        return ScheduleWedding::max('final_cost');
    }

    public function getCost($getCost)
    {
        $cost = str_replace(['₫', ' ', '.'], '', $getCost);
        $data = explode('-', $cost); // [0] => min | [1] => max

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $reqCity[0] = $req->cityId ? $req->cityId : null;
        $reqCity[1] = $req->cityName ? $req->cityName : null;

        $maxCost = $this->getMaxCost();
        $cost = $req->cost ? $this->getCost($req->cost) : [0, $maxCost];
        $data = $this->filter($cost, $reqCity[0])->appends($req->except('_token'));
        $cities = $this->getCities();

        return view('user.real_wedding', compact('data', 'cities', 'reqCity', 'maxCost', 'cost'));
    }
}
