<?php

namespace App\Http\Controllers\User;

use Auth;

use App\Models\City;
use App\Models\District;
use App\Models\User;

use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

use App\Repositories\User\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = new UserRepository($user);
    }

    public function getCities()
    {
        return City::pluck('name', 'id');
    }

    public function getDistrictsById($id)
    {
        return District::where('city_id', $id)->pluck('name', 'id');
    }

    public function getDistricts()
    {
        return District::get()->pluck('name', 'id');
    }

    public function userProfile($username)
    {
        $user = User::where('user_name', $username)->with('locations.district.city')->firstOrFail();
        $city = $this->getCities();
        $district = $this->getDistrictsById(count($user->locations) > 0 ? $user->locations[0]->district->city->id : '');

        if ($user->roles[0]->id == config('define.role.admin')) {
            return view('admin.profile', compact('city', 'district', 'user'));
        }

        return view('user.couple-profile', compact('city', 'district', 'user'));
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

            $this->userModel->update($user->id, $data);
            $user->locations()->updateOrCreate(
                ['id' => $location->id],
                [
                    'address' => $request->address,
                    'district_id' => $request->district,
                ]
            );

            if ($file) {
                $user->media()->updateOrCreate(
                    ['id' => ($user->media ? $user->media->id : null)],
                    [
                        'name' => $this->userModel->saveFile(
                            ($user->media ? $user->media->name : null),
                            $file,
                            config('asset.users.avatar')
                        )
                    ]
                );
            }
        });

        return ['message' => __('admin.success')];
    }
}
