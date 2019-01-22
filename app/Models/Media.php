<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'name',
        'mediaable_id',
        'mediaable_type',
    ];

    public function mediaable()
    {
        return $this->morphTo();
    }

}
