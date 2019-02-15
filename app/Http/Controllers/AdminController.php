<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\User;
use App\Models\Role;
use App\Models\City;
use App\Models\District;
use App\Repositories\User\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = new UserRepository($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function getDistrictsById($id)
    {
        return District::where('city_id', $id)->pluck('name', 'id');
    }

    public function getAdminLogin()
    {
        if (Auth::check())
            Auth::logout();

        $roles = Role::where('id', '<>', config('define.role.admin'))->get()->pluck('name', 'id');
        $city = City::pluck('name', 'id');

        return view('auth.login', compact('roles', 'city'));
    }

    public function postAdminLogin(Request $request)
    {
        if (Auth::attempt($request->only('user_name', 'password'))) {

            $user = Auth::user();

            if (in_array(config('define.role.admin'), $user->roles->pluck('id')->toArray()))
                return redirect()->route('admin.index');
            else
                return redirect('/');
        }

        return back()->withErrors(['message' => __('admin.fail_login')]);
    }
}
