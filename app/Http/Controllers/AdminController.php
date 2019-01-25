<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Media;
use App\Models\User;
use App\Http\Requests\AdminRequest;
use App\Repositories\User\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(AdminRequest $request)
    {
        $user = Auth::user();
        $file = $request->file('avatar_file');

        $data = [
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'password' => ($request->password ? Hash::make($request->password) : $user->password),
        ];

        try {
            $this->userModel->update($user->id, $data);

            if ($file) {
                $user->medias()->updateOrCreate(
                    [
                        'id' => ($user->medias ? $user->medias->id : null)
                    ],
                    [
                        'name' => $this->userModel->saveFile(
                            ($user->medias ? $user->medias->name : null),
                            $file,
                            config('asset.user')
                        )
                    ]
                );
            }

            return ['message' => __('success.update')];
            // return response(200);
        } catch (Exception $e) {
            return ['fail', __('fail')];
        }
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
