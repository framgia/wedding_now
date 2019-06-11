<?php

namespace App\Repositories\PageCard;

use App\Models\PageCard;
use App\Repositories\Base\BaseRepository;

class PageCardRepository extends BaseRepository implements PageCardRepositoryInterface
{
    public function __construct(PageCard $pageCard)
    {
        parent::__construct($pageCard);
    }
}
