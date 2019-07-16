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
        'item_id',
        'note',
        'time_occurs',
        'time_frame_id',
        'schedule_id',
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

    public function items()
    {
        return $this->belongsToMany(ItemUser::class)
            ->withPivot('price');
    }

    public function timeFrame()
    {
        return $this->belongsTo(TimeFrame::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
