<?php

namespace App\Repositories\Task;

use App\Repositories\Base\RepositoryInterface;

interface TaskRepositoryInterface extends RepositoryInterface
{
    public function getTasksBySchedule($id, $categoryId = null, $status = null, $orderByDate = null, $orderByPriority = null);
}
