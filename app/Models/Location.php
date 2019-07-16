<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'address',
        'district_id',
        'type',
        'user_id',
    ];

    public function locationable()
    {
        return $this->morphTo();
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
