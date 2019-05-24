<?php

namespace App\Repositories\Post;

use App\Repositories\Base\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getAll($with, $withCount);

    public function getMostRatePost($number = null, $numberSkip = null, ...$id);

    public function getNewestPostsPaginate($paginate, $skip, $posts = null);

    public function checkImagePostCollection($collection, $basePath, $pathDefault);

    public function checkAvatarOfUserPostCollection($collection, $basePath, $pathDefault);
}
