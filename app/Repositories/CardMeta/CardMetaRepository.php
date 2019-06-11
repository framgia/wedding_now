<?php

namespace App\Repositories\CardMeta;

use App\Models\CardMeta;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CardMetaRepository extends BaseRepository implements CardMetaRepositoryInterface
{
    public function __construct(CardMeta $cardMeta)
    {
        parent::__construct($cardMeta);
    }

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

    public function updateMeta($pageId, $cardMeta)
    {
        $this->model->updateOrCreate([
            'page_card_id' => $pageId,
            'id' => $cardMeta['id'],
        ], [
            'page_card_id' => $pageId,
            'div_style' => $cardMeta['div_style'],
            'textarea_style' => $cardMeta['textarea_style'],
            'content' => $cardMeta['content'],
        ]);
    }
}
