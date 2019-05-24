<?php

namespace App\Repositories\Media;

use App\Repositories\Base\RepositoryInterface;

interface MediaRepositoryInterface extends RepositoryInterface
{
    public function saveMediaOfSchedule($schedule, $data);
}
