<?php

namespace App\Repositories\Card;

use App\Repositories\Base\RepositoryInterface;

interface CardRepositoryInterface extends RepositoryInterface
{
    public function getCard($scheduleId = null);

    public function getTemplate($orientation = null);
}
