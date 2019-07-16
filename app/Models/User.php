<?php

namespace App\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
use TaylorNetwork\UsernameGenerator\FindSimilarUsernames;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EntrustUserTrait;
    use HasRelationships;
    use FindSimilarUsernames;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_name',
        'birthday',
        'email',
        'password',
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
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function locations()
    {
        return $this->morphMany(Location::class, 'locationable');
    }

    public function home()
    {
        return $this->locations()
            ->whereType(config('define.location.type.home'))
            ->take(config('define.location.get_home'));
    }

    public function items()
    {
        return $this->belongsToMany(ItemUser::class)
            ->using(ItemUser::class)->withPivot('price');
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'mediaable');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function rate()
    {
        return $this->hasMany(Rate::class);
    }
}
