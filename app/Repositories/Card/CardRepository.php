<?php

namespace App\Repositories\Card;

use App\Models\Card;
use App\Repositories\Base\BaseRepository;

class CardRepository extends BaseRepository implements CardRepositoryInterface
{
    public function __construct(Card $card)
    {
        parent::__construct($card);
    }

    public function getCard($scheduleId = null)
    {
        return $this->model->when($scheduleId != null, function ($query) use ($scheduleId) {

            $query->where('schedule_wedding_id', $scheduleId);
        })->get()->load(['pages', 'pages.cardMetas']);
    }

    public function getTemplate()
    {
        return $this->model->with('pages')->whereType(config('define.card.template'))->get();
    }
}
