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

class CardController extends Controller
{
    protected $card;

    public function __construct(Card $card, CardMeta $cardMeta)
    {
        $this->card = new CardRepository($card);

        $this->cardMeta = new CardMetaRepository($cardMeta);
    }
    public function index()
    {
        return view('user.design_card');
    }

    public function load()
    {
        $scheduleWeddingId = Session::get('schedule_id');

        $textBoxs = Card::with('cardMetas')->where('schedule_wedding_id', $scheduleWeddingId)->get();

        return $textBoxs;
    }

    public function saveCard(Request $request)
    {
        $scheduleWeddingId = Session::get('schedule_id');

        if ($request->arrDelete) {

            $arrDelete = $request->arrDelete;

            DB::transaction(function() use ($arrDelete) {

                $this->card->destroy(3);

                $this->cardMeta->deleteByCard($arrDelete);
            });   
        }
        
        foreach ($request->arrData as $textBox) {

            // dd($textBox);
            $this->card->updateOrCreate([
                'id' => $textBox['card_id'],
            ], [
                'content' => $textBox['content'],
                'schedule_wedding_id' => $scheduleWeddingId,
            ]);

            foreach ($textBox['metas'] as $key => $value) {

            $this->cardMeta->updateMeta($textBox['card_id'], $key, $value);
            }

        }
    }
}
