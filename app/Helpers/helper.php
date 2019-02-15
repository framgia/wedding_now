<?php

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
