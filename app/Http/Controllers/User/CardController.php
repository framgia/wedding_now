<?php

namespace App\Http\Controllers\User;

use App\Models\Card;
use App\Models\CardMeta;
use App\Models\ScheduleMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScheduleWedding;
use Illuminate\Support\Facades\Session;
use App\Repositories\Card\CardRepository;
use App\Repositories\CardMeta\CardMetaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Http\Requests\Client\DesignCardRequest;
use App\Repositories\ScheduleMeta\ScheduleMetaRepository;

class CardController extends Controller
{
    protected $card;
    protected $cardMeta;
    protected $scheduleMeta;

    public function __construct(Card $card, CardMeta $cardMeta, ScheduleMeta $scheduleMeta)
    {
        $this->card = new CardRepository($card);
        $this->cardMeta = new CardMetaRepository($cardMeta);
        $this->scheduleMeta = new ScheduleMetaRepository($scheduleMeta);
    }

    public function index()
    {
        return view('user.design_card');
    }

    public function getCard()
    {
        $scheduleWeddingId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $background = $this->card->getImageBackground($scheduleWeddingId);

        if ($background) {
            $background = config('asset.card_template') . $background->content;
        }

        $textBoxs = $this->card->getCardsBySchedule($scheduleWeddingId);

        return collect(['background' => $background, 'textBoxs' => $textBoxs]);
    }

    public function saveCard(DesignCardRequest $request)
    {
        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        if ($request->background) {

            $this->card->saveImageBackground($scheduleId, $request->background);
        }

        if ($request->arrDelete) {

            $arrDelete = $request->arrDelete;

            DB::transaction(function() use ($arrDelete) {

                $this->card->destroy($arrDelete);

                $this->cardMeta->deleteByCard($arrDelete);
            });
        }

        if ($request->arrData) {

            foreach ($request->arrData as $textBox) {

                $card = $this->card->updateOrCreate([
                    'id' => $textBox['card_id'],
                ], [
                    'content' => $textBox['content'],
                    'schedule_wedding_id' => $scheduleId,
                    'style' => $textBox['style'],
                ]);

                foreach ($textBox['metas'] as $key => $value) {

                    $this->cardMeta->updateMeta($card->id, $key, $value);
                }
            }
        }
    }
}
