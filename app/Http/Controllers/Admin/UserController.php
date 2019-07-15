<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use Entrust;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    protected $role;
    protected $city;
    protected $district;

    public function __construct(
        UserRepositoryInterface $user,
        RoleRepositoryInterface $role,
        CityRepositoryInterface $city,
        DistrictRepositoryInterface $district
    )
    {
        $this->user = $user;
        $this->role = $role;
        $this->city = $city;
        $this->district = $district;
    }

    public function index()
    {
        $roles = collect($this->role->getData())->pluck('name', 'id');

        $city = collect($this->city->getData())->pluck('name', 'id');

        return view('admin.list_user', compact('roles', 'city'));
    }

    public function getAll()
    {
        return $this->user->getData()->load('roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = collect($this->city->getData())->pluck('name', 'id');

        $roles = collect($this->role->findWithCondition('name', config('define.role.name.admin'), '!='))
            ->pluck('name', 'id');

        if (Entrust::hasRole('admin')) {

            $roles = collect($this->role->getData())
                ->pluck('name', 'id');
        }

        return view('admin.create_user', compact('cities', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->user->create([
            'name' => $request->name,
            'gender' => $request->gender,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'city' => $request->city,
            'district' => $request->district,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->roles()->attach($request->roles);

        $user->locations()->create([
            'district_id' => $request->district,
            'address' => $request->address,
        ]);

        return __('base.success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->findById($id)->load('roles', 'locations.district.city');

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findById($id);

        $districts = [];

        if ($user) {

            $user->load('home.district.city', 'roles', 'media');

            $districts = collect($this->district->findWithCondition('city_id', $user->home[0]->district->city->id))
                ->pluck('name', 'id');
        }

        $cities = collect($this->city->getData())->pluck('name', 'id');

        $roles = collect($this->role->findWithCondition('name', config('define.role.name.admin'), '!='))
            ->pluck('name', 'id');

        if (Entrust::hasRole('admin')) {

            $roles = collect($this->role->getData())
                ->pluck('name', 'id');
        }

        return view('admin.edit_user', compact('user', 'cities', 'roles', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $user = $this->user->findById($id);

            if ($user) {

                $user->load('home');
            }

            $user->update([
                'name' => $request->name,
                'birthday' => $request->birthday,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
            ]);

            $user->home()->update([
                'address' => $request->address,
                'district_id' => $request->district,
            ]);

            $user->roles()->sync($request->roles);

            if ($request->avatar) {

                $image = $this->user->saveFile($user->media->name, $request->avatar, config('asset.user.avatar'), config('define.avatar.width'), config('define.avatar.height'), true);

                $user->media()->update([
                    'name' => $image,
                ]);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $user = $this->user->findById($id);

            $user->roles()->detach();

            $user->locations()->delete();

            $this->user->destroy($id);
        });
    }
}
