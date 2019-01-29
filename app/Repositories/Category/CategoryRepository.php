<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getDataPluck()
    {
        $categories = Category::all()->pluck('name', 'id');

        return $categories;
    }
}
