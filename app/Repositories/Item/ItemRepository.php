<?php

namespace App\Repositories\Item;

use App\Models\Item;
use App\Repositories\BaseRepository;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    public function getItemByCategory($id)
    {
        $items = Item::with('user')
            ->whereHas('categories', function ($query) use ($id) {
                $query->where('category_id', $id);
            })->get();

        return $items;
    }
}
