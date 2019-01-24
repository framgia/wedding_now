<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleMeta extends Model
{
    protected $table = 'schedule_metas';

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
