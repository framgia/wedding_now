<?php

namespace App\Repositories\Card;

use App\Repositories\Base\RepositoryInterface;

interface CardRepositoryInterface extends RepositoryInterface
{
    public function getCard($scheduleId = null, $backgroundImage = null);

    public function getTemplate();

    public function saveImageBackground($scheduleId, $image, $templateId = null);

}
