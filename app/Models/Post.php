<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'schedule_wedding_id',
        'user_id',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scheduleWedding()
    {
        return $this->belongsTo(ScheduleWedding::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
