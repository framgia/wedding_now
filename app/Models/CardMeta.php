<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardMeta extends Model
{
    protected $table = 'card_metas';

    protected $fillable = [
    	'card_id',
    	'key',
        'value',
    ];

    public function card()
    {
    	return $this->belongTo(Card::class);
    }
}
