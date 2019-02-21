<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table = 'permissions';

    protected $fillable = [
        'slug',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot(['role_id', 'permission_id']);
    }

}
