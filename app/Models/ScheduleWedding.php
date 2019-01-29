<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleWedding extends Model
{
    protected $table = 'schedule_weddings';

    protected $fillable = [
        'name',
        'marriage_day',
        'user_id',
        'type',
        'schedule_wedding_id',
        'budget',
        'note',
        'slug',
    ];

    public function scheduleMetas()
    {
        return $this->hasMany(ScheduleMeta::class);
    }

    public function location()
    {
        return $this->morphOne(Location::class, 'localtionable');
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
