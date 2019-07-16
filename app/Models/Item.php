<?php

namespace App\Models;

use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Item extends BaseModel
{
    use HasRelationships;

    protected $table = 'items';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(ItemUser::class)
            ->withPivot('price');
    }

    public function tasks()
    {
        return $this->belongsToMany(ItemUser::class)
            ->withPivot('price');
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function rate()
    {
        return $this->morphOne(Rate::class, 'rateable');
    }

    public function locations()
    {
        return $this->morphMany(Location::class, 'locationable');
    }

}
