<?php

namespace App\Repositories\TimeFrame;

use App\Repositories\Base\RepositoryInterface;

interface TimeFrameRepositoryInterface extends RepositoryInterface
{
    public function getDataPluck();
}
