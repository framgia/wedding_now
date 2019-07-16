<?php

namespace App\Repositories\District;

use App\Repositories\Base\RepositoryInterface;

interface DistrictRepositoryInterface extends RepositoryInterface
{
    public function searchLocation($keyword);
}
