<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleWedding extends Model
{
    protected $table = 'schedule_weddings';

    protected $fillable = [
        'name',
        'marring_day',
        'user_id',
        'type',
        'schedule_wedding_id',
        'budget',
        'note',
        'slug',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function schedulemetas()
    {
        return $this->hasMany(Schedulemeta::class);
    }

    public function location()
    {
        return $this->morphTo(Location::class);
    }

    public function medias()
    {
        return $this->morphToMany(Media::class);
    }
}
