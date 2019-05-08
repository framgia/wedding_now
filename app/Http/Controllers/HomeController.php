<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Repositories\Post\PostRepository;
use App\Repositories\Topic\TopicRepository;
use App\Models\Post;
use App\Models\ScheduleWedding;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepository;
use App\Models\ScheduleMeta;
use App\Repositories\ScheduleMeta\ScheduleMetaRepository;

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

    public function __construct(
        Post $post,
        ScheduleWedding $scheduleWedding,
        ScheduleMeta $scheduleMeta
    )
    {
        // $this->middleware(['auth', 'verified']);
        $this->post = new PostRepository($post);
        $this->scheduleWedding = new ScheduleWeddingRepository($scheduleWedding);
        $this->scheduleMeta = new ScheduleMetaRepository($scheduleMeta);
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

        $scheduleMeta = $this->scheduleMeta->getChosenSchedule();

        $schedule_default = null;

        if (!$scheduleMeta) {
            $schedule_default = $this->scheduleWedding->getAllScheduleDefault();
        }

        $data = [
            'default',
            'custom',
            'combo',
            'posts',
            'schedule_default',
        ];

        return view('index', compact($data));
    }

    public function changeLang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);

            return redirect()->back();
        }
    }
}
