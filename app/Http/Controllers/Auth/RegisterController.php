<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->middleware('guest');
        $this->user = $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => 'required',
            'birthday' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'role' => 'required|not_in:' . config('define.role.admin'),
            'phone' => ['required', 'digits_between:9,11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'min:6', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => 'same:password',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = null;

        $user = DB::transaction(function () use ($data) {

            $user = $this->user->create([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'birthday' => $data['birthday'],
                'city' => $data['city'],
                'district' => $data['district'],
                'address' => $data['address'],
                'phone' => $data['phone'],
            ]);

            $user->roles()->attach($data['role']);

            $user->locations()->create([
                'district_id' => $data['district'],
                'address' => $data['address'],
            ]);

            return $user;
        });

        return $user;
    }
}
