<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleMeta extends Model
{
    protected $table = 'schedule_metas';

    protected $fillable = [
        'schedule_id',
        'key',
        'value',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
