<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $filable = [
        'name',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
