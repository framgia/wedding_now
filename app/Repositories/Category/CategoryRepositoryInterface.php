<?php

namespace App\Repositories\Category;

use App\Repositories\Base\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getDataPluck();

    public function getCategoriesWithCountTasks($scheduleId);

    public function getItem($idCategory);

    public function getItemNearUser($idCategory);

    public function seachItem($idCategory, $keyword, $filterPrice = '');

    public function seachItemsNearUser($idCategory, $keyword, $filterPrice = '');

}
