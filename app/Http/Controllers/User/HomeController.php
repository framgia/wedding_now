<?php

namespace App\Http\Controllers\User;

use App\Repositories\Card\CardRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $langActive = [
        'vn',
        'en',
    ];

    protected $post;
    protected $scheduleWedding;
    protected $scheduleMeta;
    protected $card;

    public function __construct(
        PostRepositoryInterface $post,
        ScheduleWeddingRepositoryInterface $scheduleWedding,
        ScheduleMetaRepositoryInterface $scheduleMeta,
        CardRepositoryInterface $card
    )
    {
        $this->post = $post;
        $this->scheduleWedding = $scheduleWedding;
        $this->scheduleMeta = $scheduleMeta;
        $this->card = $card;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $default = config('define.type_schedule.default');

        $custom = config('define.type_schedule.custom');

        $combo = config('define.type_schedule.combo');

        $posts = $this->post->getNewestPostsPaginate(config('define.post.take_five_post'), config('define.post.no_skip'));

        $posts = $this->post->timePass($posts);

        $scheduleMeta = $this->scheduleMeta->getChosenSchedule();

        $schedule_default = null;

        if (!$scheduleMeta) {
            $schedule_default = $this->scheduleWedding->getAllScheduleDefault();
        }

        $templateHorizontal = $this->card->getTemplate(config('define.card.horizontal'))
            ->take(config('define.card.number.show_card'));

        $templateVertical = $this->card->getTemplate(config('define.card.vertical'))
            ->take(config('define.card.number.show_card'));

        return view('user.index', compact('default', 'custom', 'combo', 'posts', 'schedule_default', 'templateHorizontal', 'templateVertical'));
    }

    public function changeLang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);

            return redirect()->back();
        }
    }
}
