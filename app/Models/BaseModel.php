<?php

namespace App\Models;

use App\BuilderCustom\EloquentBuild;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function newEloquentBuilder($query)
    {
        return new EloquentBuild($query);
    }
}