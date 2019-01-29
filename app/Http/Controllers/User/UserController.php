<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function toDo()
    {
        return view('user.to-do-list');
    }

    public function myProfile()
    {
        return view('user.couple-profile');
    }
}
