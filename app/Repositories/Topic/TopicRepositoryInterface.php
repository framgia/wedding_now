<?php

namespace App\Repositories\Topic;

use App\Repositories\Base\RepositoryInterface;

interface TopicRepositoryInterface extends RepositoryInterface
{
    public function checkImageCollection($collection, $basePath, $pathDefault);
}
