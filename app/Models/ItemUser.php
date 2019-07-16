<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemUser extends Pivot
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }


}
