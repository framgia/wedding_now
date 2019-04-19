<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    protected $fillable = [
        'id',
        'schedule_wedding_id',
        'name',
        'type',
        'card_id',
        'background_image'
    ];

    public function scheduleWedding()
    {
        return $this->belongTo(ScheduleWedding::class);
    }

    public function cardMetas()
    {
        return $this->hasMany(CardMeta::class);
    }

    public function scopeTemplate($query)
    {
        return $query->whereType(config('define.card.template'));
    }

    public function scopeCustom($query)
    {
        return $query->whereType(config('define.card.custom'));
    }
}
