<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
