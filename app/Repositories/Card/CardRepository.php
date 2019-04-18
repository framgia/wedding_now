<?php

namespace App\Repositories\Card;

use App\Models\Card;
use App\Repositories\BaseRepository;

class CardRepository extends BaseRepository implements CardRepositoryInterface
{
    public function getCard($scheduleId = null, $backgroundImage = null)
    {
        return $this->model->when($scheduleId != null, function($query) use ($scheduleId) {
            $query->where('schedule_wedding_id', $scheduleId);
        })->get();
    }

    public function getTemplate()
    {
        return $this->model->whereType(config('define.card.template'))->get();
    }

    public function saveImageBackground($scheduleId, $image, $templateId = null)
    {
        $this->model->updateOrCreate([
            'schedule_wedding_id' => $scheduleId,
        ], [
            'background_image' => $image,
            'name' => config('define.image_card'),
        ]);

        $this->model->when($templateId != null, function($query) {
            $query->update([
                'schedule_wedding_id' => $scheduleId,
            ], [
                'background_image' => $image,
                'name' => config('define.image_card'),
            ]);
        });
    }
}
