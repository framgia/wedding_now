<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'commentable_id',
        'commentable_type',
        'created_at',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
