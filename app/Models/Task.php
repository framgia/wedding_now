<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'priority',
        'category_id',
        'item_user_id',
        'note',
        'time_occurs',
        'time_frame_id',
        'schedule_wedding_id',
        'price',
        'percent',
    ];

    public function location()
    {
        return $this->morphTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itemUser()
    {
        return $this->belongsTo(ItemUser::class);
    }

    public function timeFrame()
    {
        return $this->belongsTo(TimeFrame::class);
    }

    public function scheduleWedding()
    {
        return $this->belongsTo(ScheduleWedding::class);
    }
}
