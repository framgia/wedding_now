<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeFrame extends Model
{
    protected $table = 'time_frames';

    protected $fillable = [
        'time_frame',
        'value',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
