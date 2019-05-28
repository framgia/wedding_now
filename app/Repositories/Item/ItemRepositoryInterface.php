<?php

namespace App\Repositories\Item;

use App\Repositories\Base\RepositoryInterface;

interface ItemRepositoryInterface extends RepositoryInterface
{
    public function getItemByCategory($id);
}
