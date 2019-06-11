<?php

use Illuminate\Support\Facades\Auth;
use App\Models\ScheduleMeta;

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

    $default = ScheduleMeta::with('scheduleWedding')
        ->whereHas('scheduleWedding.user', function ($query) {
            $query->where('users.id', Auth::id());
        })->where('key', config('define.default'))->first();

    if ($default) {
        $result = true;
    }

    return $result;
}
