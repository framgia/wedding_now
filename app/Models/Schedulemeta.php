<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedulemeta extends Model
{
    protected $table = 'schedulemeta';

    protected $fillable = [
        'schedule_wedding_id',
        'key',
        'value',
    ];

    public function scheduleWedding()
    {
        return $this->belongsTo(ScheduleWedding::class);
    }
}
