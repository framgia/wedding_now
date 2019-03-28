<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'schedule_wedding_id',
        'user_id',
        'slug',
        'brief',
        'status',
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

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function scopeNumberStarPost($query)
    {
        return $query->join('rates', function($q) {
                $q->on('rates.rateable_id', '=', 'posts.id');
                $q->where('rates.rateable_type', '=', 'App\Models\Post');
            })->selectRaw('sum(star) as number_star')
                ->groupBy('rates.rateable_id')
                ->orderBy('number_star', 'desc');
    }

    public function scopePublic($query)
    {
        return $query->whereStatus(config('define.post.status.public'));
    }
}
