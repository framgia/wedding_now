<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemUser extends Model
{
    protected $table = 'item_user';

    protected $fillable = [
        'item_id',
        'user_id',
        'price',
    ];

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
