<?php

namespace App\Http\Controllers\User;

use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $user;
    protected $city;
    protected $district;

    public function __construct(UserRepositoryInterface $user, CityRepositoryInterface $city, DistrictRepositoryInterface $district)
    {
        $this->user = $user;
        $this->city = $city;
        $this->district = $district;
    }

    public function userProfile($username)
    {
        $user = Auth::user()->load('locations.district.city');

        $city = collect($this->city->getData())->pluck('name', 'id');

        $id = count($user->locations) > 0 ? $user->locations[0]->district->city->id : '';

        $district = collect($this->district->findWithCondition('city_id', $id))->pluck('name', 'id');

        return view('user.couple_profile', compact('city', 'district', 'user'));
    }

    public function update(AdminRequest $request)
    {
        DB::transaction(function () use ($request) {

            $user = Auth::user()->load('locations.district.city', 'media');

            $file = $request->file('avatar_file');

            $data = [
                'name' => $request->name,
                'birthday' => $request->birthday,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'password' => ($request->password ? Hash::make($request->password) : $user->password),
            ];

            $location = $user->locations[0];

            $this->user->update($user->id, $data);

            $user->locations()->updateOrCreate([
                'id' => $location->id
            ], [
                'address' => $request->address,
                'district_id' => $request->district,
            ]);

            $id = $user->media ? $user->media->id : null;

            $name = $user->media ? $user->media->name : null;

            if ($file) {
                $user->media()->updateOrCreate([
                    'id' => $id
                ], [
                    'name' => $this->user->saveFile($name, $file, config('asset.users.avatar'), 80, 80)
                ]);
            }
        });

        return ['message' => __('base.success')];
    }

    public function getDistrictsById($id)
    {
        return $this->district->findWithCondition('city_id', $id)->pluck('name', 'id');
    }
}
