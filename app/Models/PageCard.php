<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCard extends Model
{
    protected $table = 'page_cards';

    protected $fillable = [
		'card_id',
		'background',
    ];

    public function card()
    {
    	return $this->belongsTo(Card::class);
    }

    public function cardMetas()
    {
        return $this->hasMany(CardMeta::class);
    }
}
