<?php

namespace App\Http\Controllers\Admin;

use Entrust;

use App\Models\User;
use App\Models\Role;
use App\Models\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;

use App\Repositories\User\UserRepository;

use Illuminate\Http\Request;
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

    public function __construct(User $user)
    {
        $this->user = new UserRepository($user);
    }

    public function index()
    {
        $roles = Role::pluck('name', 'id');
        $city = City::pluck('name', 'id');

        return view('admin.user.user', compact('roles', 'city'));
    }

    public function getList()
    {
        return User::All()->load('roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if (!Entrust::can('user-create')) {
            return __('base.error');
        }

        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'city' => $request->city,
            'district' => $request->district,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);

        $user->roles()->attach($request->role);

        $user->locations()->create([
            'district_id' => $request->district,
            'address' => $request->address,
        ]);

        return __('base.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $user = $this->user->findById($id)->load('locations.district.city', 'media');

        try {
            DB::beginTransaction();

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
                $user->locations()->updateOrCreate(
                    ['id' => $location->id],
                    [
                        'address' => $request->address,
                        'district_id' => $request->district,
                    ]
                );
            DB::commit();

            return __('base.success');
        } catch (Exception $e) {
            return __('base.fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
