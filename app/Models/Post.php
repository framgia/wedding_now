<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'schedule_id',
        'user_id',
        'topic_id',
        'slug',
        'brief',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function images()
    {
        return $this->medias()->whereType(config('define.type_media.image'));
    }

    public function videos()
    {
        return $this->medias()->whereType(config('define.type_media.video'));
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
        return $query->join('rates', function ($q) {
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

    public function increment($column, $amount = 1, array $extra = [])
    {
        return parent::increment($column, $amount, $extra);
    }
}
