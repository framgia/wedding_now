<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $table = 'schedules';

    protected $fillable = [
        'name',
        'marriage_day',
        'user_id',
        'type',
        'schedule_id',
        'budget',
        'note',
        'slug',
        'default',
    ];

    protected $dates = ['deleted_at'];

    public function scheduleMetas()
    {
        return $this->hasMany(ScheduleMeta::class);
    }

    public function childSchedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function parentSchedule()
    {
        return $this->belongsTo(Schedule::class);
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

    public function scopeIsWeddingUser($query)
    {
        return $query->whereType(config('define.type_schedule.custom'));
    }

    public function scopeIsPackage($query)
    {
        return $query->whereType(config('define.type_schedule.package'));
    }
}
