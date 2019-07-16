<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Tài khoản hoặc mật khẩu không đúng',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'required' => [
        'email' => 'Email Không Để Trống',
        'password' => 'Mật Khẩu Không Để Trống',
        'yourname' => 'Tên Bạn Kkông Để Trống',
        'phone' => 'Số Điện Thoại Không Để Trống',
        'address' => 'Địa Chỉ Không Để Trống',
        'password_confirm' => 'Chưa Nhập Lại Mật Khẩu',
        'gender' => 'Chưa Chon Giới Tính',
        'role' => 'Chưa Chon Vai Trò',
    ],
    'min' => [
        'password' => 'Mật Khẩu Quá Ngắn',
        'yourname' => 'Tên Bạn Quá Ngắn',
        'phone' => 'Số Điện Thoại Quá Ngắn',
        'address' => 'Địa Chỉ Quá Ngắn',
    ],
    'max' => [
        'password' => 'Mật Khẩu Quá Dài',
        'yourname' => 'Tên Bạn Quá Dài',
        'phone' => 'Số Điện Thoại Quá Dài',
        'address' => 'Địa Chỉ Quá Dài',
    ],
    'equalTo' => [
        'password' => 'Mật Khẩu Không Khớp',
    ],
    'email' => [
        'email' => 'Email sai định dạng',
    ],
];
