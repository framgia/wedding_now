<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
