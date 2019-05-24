<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\Base\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function __construct(Tag $tag)
    {
        parent::__construct($tag);
    }
}
