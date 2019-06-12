<?php

namespace App\Repositories\Item;

use App\Models\Item;
use App\Repositories\Base\BaseRepository;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    public function __construct(Item $item)
    {
        parent::__construct($item);
    }

    public function getItemByCategory($id)
    {
        $items = $this->model->with('user')
            ->whereHas('categories', function ($query) use ($id) {
                $query->where('category_id', $id);
            })
            ->get();

        return $items;
    }
}
