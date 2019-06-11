<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardMeta extends Model
{
    protected $table = 'card_metas';

    protected $fillable = [
        'page_card_id',
        'key',
        'div_style',
        'content',
        'textarea_style',
    ];

    public function card()
    {
        return $this->belongTo(Card::class);
    }
}
