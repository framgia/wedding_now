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
}
