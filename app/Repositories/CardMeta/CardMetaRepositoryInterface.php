<?php

namespace App\Repositories\CardMeta;

use App\Repositories\Base\RepositoryInterface;

interface CardMetaRepositoryInterface extends RepositoryInterface
{
    public function getByCard($cardId);

    public function deleteByCard($card_id, $arrId);

    public function updateMeta($cardId, $cardMeta);

}
