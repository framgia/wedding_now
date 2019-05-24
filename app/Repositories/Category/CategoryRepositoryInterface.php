<?php

namespace App\Repositories\Category;

use App\Repositories\Base\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getDataPluck();

    public function getCategoriesWithCountTasks($scheduleId);

    public function getItem($id);

    public function getItemNearUser($id);

}
