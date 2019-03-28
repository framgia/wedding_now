<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = [
        'star',
        'content',
        'user_id',
        'rateable_id',
        'rateable_type',
    ];

    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
