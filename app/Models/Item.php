<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function rate()
    {
        return $this->morphOne(Rate::class, 'rateable');
    }
}
