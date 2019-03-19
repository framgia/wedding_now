<?php

namespace App\Http\Controllers\User;

use App\Models\Card;
use App\Models\CardMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScheduleWedding;
use Illuminate\Support\Facades\Session;
use App\Repositories\Card\CardRepository;
use App\Repositories\CardMeta\CardMetaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CardController extends Controller
{
    protected $card;
    protected $cardMeta;

    public function __construct(Card $card, CardMeta $cardMeta)
    {
        $this->card = new CardRepository($card);

        $this->cardMeta = new CardMetaRepository($cardMeta);
    }
    public function index()
    {
        return view('user.design_card');
    }

    public function getCard()
    {
        $scheduleWeddingId = Session::get('schedule_id');

        $background = $this->card->getImageBackground($scheduleWeddingId);

        if ($background) {
            $background = config('asset.card_template') . $background->content;
        }

        $textBoxs = $this->card->getCardsBySchedule($scheduleWeddingId);

        return collect(['background' => $background, 'textBoxs' => $textBoxs]);
    }

    public function saveCard(Request $request)
    {
        $scheduleId = Session::get('schedule_id');

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
