<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'name',
        'type',
        'user_id',
    ];

    public function mediaable()
    {
        return $this->morphTo();
    }
}
