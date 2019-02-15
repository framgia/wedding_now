<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;

use App\Repositories\User\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return view('admin.user', compact('roles', 'city'));
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

        return __('admin.success');
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
        // $roles = Role::pluck('name', 'id');
        // $city = City::pluck('name', 'id');

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
    public function update(Request $request, $id)
    {
        //
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
