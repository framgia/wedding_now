<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withPivot(['role_id', 'permission_id']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
