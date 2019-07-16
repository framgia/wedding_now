<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    protected $fillable = [
        'schedule_id',
        'name',
        'type',
        'card_id',
        'orientation',
        'number_pages',
        'present_img',
    ];

    public function schedule()
    {
        return $this->belongTo(Schedule::class);
    }

    public function pages()
    {
        return $this->hasMany(PageCard::class);
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
