<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $role;
    protected $city;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoleRepositoryInterface $role, CityRepositoryInterface $city)
    {
        $this->middleware('guest')->except('logout');
        $this->role = $role;
        $this->city = $city;
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        $roles = $this->role->getData()->sortBy('name')->except(1)->pluck('name', 'id');

        $city = $this->city->getData()->pluck('name', 'id');

        return view('auth.login', compact('roles', 'city'));
    }

    public function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username() : 'user_name';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    protected function sendFailedLoginResponse()
    {
        Alert::error(trans('auth.failed'), 'Oops!');

        return Redirect::back()->withInput(Input::all());
    }
}
