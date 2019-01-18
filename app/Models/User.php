<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'email',
        'password',
        'introduction',
        'gender',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function posts()
    {
        return $this->hasMany(News::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function location()
    {
        return $this->morphTo(Location::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->wherePivot('price');
    }

    public function medias()
    {
        return $this->morphToMany(Media::class);
    }
}
