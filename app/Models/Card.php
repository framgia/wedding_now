<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    protected $fillable = [
        'id',
        'schedule_wedding_id',
        'text_box_name',
        'content',
        'style',
    ];

    public function scheduleWedding()
    {
        return $this->belongTo(ScheduleWedding::class);
    }

    public function cardMetas()
    {
        return $this->hasMany(CardMeta::class);
    }
}
