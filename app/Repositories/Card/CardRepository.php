<?php

namespace App\Repositories\Card;

use App\Models\Card;
use App\Repositories\BaseRepository;

class CardRepository extends BaseRepository implements CardRepositoryInterface
{
    public function getImageBackground($scheduleId)
    {
        return $this->model->where([
            ['schedule_wedding_id', $scheduleId],
            ['text_box_name', config('define.image_card_text_box')]
        ])->first(['content']);
    }

    public function getCardsBySchedule($scheduleId)
    {
        return $this->model->with('cardMetas')->where([
            ['schedule_wedding_id', $scheduleId],
            ['text_box_name', '!=', config('define.image_card_text_box')]
        ])->orWhere([
            ['schedule_wedding_id', $scheduleId],
            ['text_box_name', null]
        ])->get();
    }

    public function saveImageBackground($scheduleId, $image)
    {
        $this->model->updateOrCreate([
            'schedule_wedding_id' => $scheduleId,
            'text_box_name' => config('define.image_card_text_box'),
         ], [
            'schedule_wedding_id' => $scheduleId,
            'text_box_name' => config('define.image_card_text_box'),
            'content' => $image,
         ]);
    }
}
