<?php

namespace App\Repositories\Post;

use App\Repositories\Base\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getAll($with, $withCount);

    public function getMostRatePost($type = [], $number = null, $numberSkip = null, $ids = []);

    public function getNewestPostsPaginate($paginate, $skip, $posts = null);

    public function checkImagePostCollection($collection, $basePath, $pathDefault);

    public function getPostOrderByView($type = [], $number = null, $numberSkip = null, $ids = []);
}
