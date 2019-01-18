<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'address',
        'locationable_id',
        'locationable_type',
    ];

    public function target()
    {
        return $this->morphTo();
    }
}
