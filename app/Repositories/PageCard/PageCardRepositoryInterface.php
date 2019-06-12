<?php

namespace App\Repositories\PageCard;

use App\Repositories\Base\RepositoryInterface;

interface PageCardRepositoryInterface extends RepositoryInterface
{
    public function updateOrCreate($id, $data);
}
