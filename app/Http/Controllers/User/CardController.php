<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Client\ChooseOrientationRequest;
use App\Repositories\Card\CardRepositoryInterface;
use App\Repositories\CardMeta\CardMetaRepositoryInterface;
use App\Repositories\PageCard\PageCardRepositoryInterface;
use App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Throwable;

class CardController extends Controller
{
    protected $card;
    protected $cardMeta;
    protected $pageCard;
    protected $scheduleMeta;

    public function __construct(
        CardRepositoryInterface $card,
        CardMetaRepositoryInterface $cardMeta,
        PageCardRepositoryInterface $pageCard,
        ScheduleMetaRepositoryInterface $scheduleMeta
    )
    {
        $this->card = $card;
        $this->cardMeta = $cardMeta;
        $this->pageCard = $pageCard;
        $this->scheduleMeta = $scheduleMeta;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $card = collect($this->card->getCard($scheduleId))->first();

        return view('user.design_card', compact('card'));
    }

    /**
     * @return string
     * @throws Throwable
     */
    public function getTemplates()
    {
        $templates = $this->card->getTemplate();

        return view('user.card.templates', compact('templates'))->render();
    }

    public function chooseOrientation(ChooseOrientationRequest $request)
    {
        $orientation = $request->orientation;

        Session::put('orientation', $orientation);
    }

    public function chooseTemplate(Request $request)
    {
        if ($request->ajax()) {

            $idCard = $request->id;

            $card = $this->card->findById($idCard)->load('pages.cardMetas');

            return view('user.card.new_card', compact('card'));
        }
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getDesignCard(Request $request)
    {
        if ($request->ajax()) {

            $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

            $card = collect($this->card->getCard($scheduleId))->first();

            if ($card) {

                return view('user.card.result_card', compact('card'));
            }
        }
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function createPage(Request $request)
    {
        if ($request->ajax()) {
            return view('user.card.new_page');
        }
    }

    public function updateName(Request $request)
    {
        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $card = collect($this->card->getCard($scheduleId))->first();

        $card = $this->card->updateOrCreate([
            'id' => $card->id,
        ], [
            'schedule_wedding_id' => $scheduleId,
            'name' => $request->name,
            'type' => config('define.card.custom'),
            'orientation' => config('define.card.vertical'),
        ]);

        return $card->name;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function saveCard(Request $request)
    {
        $pages = $request->pages;

        $scheduleId = $this->scheduleMeta->getChosenSchedule()->schedule_wedding_id;

        $card = collect($this->card->getCard($scheduleId))->first();

        DB::transaction(function () use ($card, $scheduleId, $pages) {

            $newCard = $card ?? $this->card->create([
                'schedule_wedding_id' => $scheduleId, 'name' => config('define.card.name') . Auth::user()->name,
                'type' => config('define.card.custom'),
                'orientation' => config('define.card.vertical'),
                'number_pages' => count($pages),
            ]);

            foreach ($pages as $page) {

                $newPage = $this->pageCard->updateOrCreate([
                    'id' => $page['id'],
                ], [
                    'card_id' => $newCard->id,
                    'background' => $page['background'],
                ]);

                if (array_key_exists('boxes', $page)) {

                    foreach ($page['boxes'] as $box) {

                        $this->cardMeta->updateOrCreate([
                            'id' => $box['id'],
                        ], [
                            'page_card_id' => $newPage->id,
                            'div_style' => $box['div_style'],
                            'textarea_style' => $box['textarea_style'],
                            'content' => $box['content'],
                        ]);
                    }
                }
            }
        });
    }
}
