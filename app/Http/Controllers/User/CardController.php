<?php

namespace App\Http\Controllers\User;

use App\Models\Card;
use App\Models\CardMeta;
use App\Models\ScheduleMeta;
use App\Repositories\Card\CardRepositoryInterface;
use App\Repositories\CardMeta\CardMetaRepositoryInterface;
use App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface;
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
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    protected $card;
    protected $cardMeta;
    protected $scheduleMeta;

    public function __construct(CardRepositoryInterface $card, CardMetaRepositoryInterface $cardMeta, ScheduleMetaRepositoryInterface $scheduleMeta)
    {
        $this->card = $card;
        $this->cardMeta = $cardMeta;
        $this->scheduleMeta = $scheduleMeta;
    }

    public function index()
    {
        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $card = $this->card->getCard($scheduleId)->first();

        if (!$card) {

            $templates = $this->card->getTemplate();

            return view('user.choose_template', compact('templates'));
        }

        return view('user.design_card', compact('card'));
    }

    public function chooseTemplate(Request $request)
    {
        $idCard = $request->id;

        $card = $this->card->findById($idCard);

        $background = $card->background_image;

        $cardMetas = $this->cardMeta->getByCard($idCard);

        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        DB::transaction(function() use ($cardMetas, $scheduleId, $background) {

            $card = $this->card->create([
                'schedule_wedding_id' => $scheduleId,
                'name' => config('define.card.name') . Auth::user()->name,
                'type' => config('define.card.custom'),
                'background_image' => $background
            ]);

            foreach ($cardMetas as $meta) {

                $this->cardMeta->create([
                    'card_id' => $card->id,
                    'content' => $meta->content,
                    'div_style' => $meta->div_style,
                    'textarea_style' => $meta->textarea_style,
                ]);
            }
        });
    }

    public function getDesignCard()
    {
        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $card = $this->card->getCard($scheduleId)->first();

        $background = $card->background_image;

        if ($background) {

            $background = config('asset.card_template') . $background;
        }

        $textBoxs = $this->cardMeta->getByCard($card->id);

        return collect(['background' => $background, 'textBoxs' => $textBoxs]);
    }

    public function saveCard(DesignCardRequest $request)
    {
        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $templateId = $request->template_id;

        $card = $this->card->getCard($scheduleId)->first() ?? $this->card->create([
                'schedule_wedding_id' => $scheduleId,
                'name' => config('define.card.name') . Auth::user()->name,
                'type' => config('define.card.custom'),
                'background_image' => null
            ]);;

        if ($request->background) {

            $this->card->saveImageBackground($scheduleId, $request->background, $templateId);
        }

        if ($request->arrDelete) {

            $arrDelete = $request->arrDelete;

            DB::transaction(function() use ($card, $arrDelete) {

                $this->cardMeta->deleteByCard($card->id, $arrDelete);
            });
        }

        if ($request->arrTextBox) {

            foreach ($request->arrTextBox as $cardMeta) {

                $this->cardMeta->updateMeta($card->id, $cardMeta);
            }
        }
    }
}
