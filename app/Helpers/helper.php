<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

function isAdmin()
{
    if (Auth::check()) {
        return in_array(config('define.role.admin'), Auth::user()->roles->pluck('id')->toArray());
    }
}

function isVendor()
{
    if (Auth::check()) {
        return in_array(config('define.role.vendor'), Auth::user()->roles->pluck('id')->toArray());
    }
}

function hasSchedule()
{
    $result = false;

    $default = Schedule::where([
        ['user_id', Auth::id()],
        ['default',true],
        ['type', config('define.type_schedule.custom')],
    ])->first();

    if ($default) {

        $result = true;
    }

    return $result;
}

function getBriefFromContent($str, $n = 500, $end_char = '&#8230;')
{
    if (strlen($str) < $n) {
        return $str;
    }

    $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

    if (strlen($str) <= $n) {
        return $str;
    }

    $out = "";
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';

        if (strlen($out) >= $n) {
            $out = trim($out);
            return (strlen($out) == strlen($str)) ? $out : $out . $end_char;
        }
    }
}
