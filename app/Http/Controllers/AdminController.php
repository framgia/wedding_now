<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(AdminRequest $request)
    {
        //
    }

    public function getAdminLogin()
    {
        if (Auth::check())
            Auth::logout();

        return view('auth.login');
    }

    public function postAdminLogin(Request $request)
    {
        if (Auth::attempt($request->only('user_name', 'password'))) {

            $user = Auth::user();

            if (in_array(config('define.role.admin'), $user->roles->pluck('id')->toArray()))
                return redirect()->route('admin.index');
            else
                Auth::logout();
        }

        return back()->withErrors(['message' => __('fail_login')]);
    }
}
