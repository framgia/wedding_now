<?php

namespace App\Repositories\CardMeta;

use App\Models\CardMeta;
use App\Repositories\BaseRepository;

class CardMetaRepository extends BaseRepository implements CardMetaRepositoryInterface
{
      public function getByCard($cardId)
      {
         return $this->model->where('card_id', $cardId)->get();
      }

      public function deleteByCard($card_id, $arrId)
      {
         foreach ($arrId as $id) {

            $this->model->where('card_id', $card_id)->where('id', $id)->delete();
         }
      }

      public function updateMeta($cardId, $cardMeta)
      {
         $this->model->updateOrCreate([
            'card_id' => $cardId,
            'id' => $cardMeta['id'],
         ], [
            'card_id' => $cardId,
            'div_style' => $cardMeta['div_style'],
            'textarea_style' => $cardMeta['textarea_style'],
            'content' => $cardMeta['content']
         ]);
      }
}
