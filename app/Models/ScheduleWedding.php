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

    public function scheduleMetasPluck()
    {
        return $this->scheduleMetas()
            ->join('schedule_weddings', 'schedule_weddings.id', '=', 'schedule_metas.schedule_wedding_id')
            ->select('schedule_metas.schedule_wedding_id', 'schedule_metas.key', 'schedule_metas.value');
    }

    public function location()
    {
        return $this->morphOne(Location::class, 'locationable');
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imgMain()
    {
        return $this->medias()->orderBy('id', 'desc')->limit(1);
    }
}
