<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Client\PaginateRealWeddingRequest;
use App\Models\Post;
use App\Models\ScheduleMeta;
use App\Models\ScheduleWedding;
use App\Models\Task;
use App\Repositories\Post\PostRepository;
use App\Repositories\ScheduleMeta\ScheduleMetaRepository;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepository;
use App\Http\Controllers\Controller;
use App\Repositories\Task\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealWeddingController extends Controller
{
    protected $post;
    protected $wedding;
    protected $task;

    public function __construct(Post $post, ScheduleWedding $scheduleWedding, ScheduleMeta $meta, Task $task)
    {
        $this->post = new PostRepository($post);
        $this->wedding = new ScheduleWeddingRepository($scheduleWedding);
        $this->meta = new ScheduleMetaRepository($meta);
        $this->task = new TaskRepository($task);
    }

    public function index()
    {
        $posts = $this->post->getMostRatePost(config('define.post.take_three_post'), config('define.post.recommend'));

        $packages = $this->wedding->getPackages(config('define.package_service_paginate'));

        return view('user.real_wedding', compact('posts', 'packages'));
    }

    public function loadFilterRealWedding(PaginateRealWeddingRequest $request)
    {
        if ($request->ajax()) {

            $page = $request->page;

            $minPrice = null;

            $maxPrice = null;

            $orderByRate = null;

            switch ($request->price_option) {
                case 1:

                    $minPrice = config('define.price_filter.option_1.min');

                    $maxPrice = config('define.price_filter.option_1.max');

                    break;
                case 2:

                    $minPrice = config('define.price_filter.option_2.min');

                    $maxPrice = config('define.price_filter.option_2.max');

                    break;
                case 3:

                    $minPrice = config('define.price_filter.option_3.min');

                    $maxPrice = config('define.price_filter.option_3.max');

                    break;
                case 4:

                    $minPrice = config('define.price_filter.option_4.min');

                    break;
            }

            $weddings = $this->wedding->paginate($this->wedding->filterWedding($minPrice, $maxPrice, $orderByRate), config('define.real_wedding_paginate'), $page);

            return view('user.sections.result_real_wedding', compact('weddings'))->render();
        }
    }

    public function detail(Request $request)
    {
        $schedule = $this->wedding->findById($request->id)->load('tasks.category');

        $tasks = $schedule->tasks;

        $countTask = count($tasks);

        return view('user.detail_real_wedding', compact('schedule', 'tasks', 'countTask'));
    }

    public function copySchedule(Request $request)
    {
        $schedule = $this->wedding->findById($request->id)->load('tasks');
        $tasks = $schedule->tasks;
        $schedule->schedule_wedding_id = $request->id;
        $schedule->user_id = Auth::id();
        $schedule->name = config('define.schedule_name') . Auth::user()->name;
        $schedule->type = config('define.type_schedule.custom');
        $schedule->slug = str_slug($schedule->name);

        $newSchedule = $this->wedding->create($schedule->toArray());

        $tasks->map(function ($item, $key) use ($newSchedule) {
            $item->schedule_wedding_id = $newSchedule->id;

            return $this->task->create($item->toArray());
        });

        $this->meta->setChosenSchedule($newSchedule->id);

        return redirect()->route('client.to-do-list');
    }
}
