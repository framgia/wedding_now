<?php

namespace App\Repositories\CardMeta;

use App\Models\CardMeta;
use App\Repositories\BaseRepository;

class CardMetaRepository extends BaseRepository implements CardMetaRepositoryInterface
{
      public function deleteByCard($arrId)
      {
         foreach ($arrId as $id) {

            $this->model->where('card_id', $id)->delete();
         }
      }

      public function updateMeta($card_id, $key, $value)
      {
         $this->model->updateOrCreate([
            'card_id' => $card_id,
            'key' => $key,
         ], [
            'card_id' => $card_id,
            'key' => $key,
            'value' => $value,
         ]);
      }
}
