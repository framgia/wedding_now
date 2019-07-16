<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Client\PaginateRealWeddingRequest;
use App\Models\Task;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class RealWeddingController extends Controller
{
    protected $post;
    protected $schedule;
    protected $scheduleMeta;
    protected $task;
    protected $category;

    public function __construct(
        PostRepositoryInterface $post,
        ScheduleRepositoryInterface $schedule,
        ScheduleMetaRepositoryInterface $scheduleMeta,
        Task $task,
        CategoryRepositoryInterface $category
    )
    {
        $this->post = $post;
        $this->schedule = $schedule;
        $this->meta = $scheduleMeta;
        $this->task = $task;
        $this->category = $category;
    }

    public function index()
    {
        $categories = collect($this->category->getData())->pluck('name', 'id');

        $posts = $this->post->getMostRatePost([config('define.post.type.schedule'), config('define.post.type.item')], config('define.post.take_three_post'), config('define.post.recommend'));

        $packages = $this->schedule->getPackages(config('define.package_service_paginate'));

        $weddings = $this->schedule->paginate($this->schedule->filterWedding(null, null, null), config('define.real_wedding_paginate'), config('define.page_first'));

        return view('user.real_wedding', compact('weddings', 'posts', 'packages', 'categories'));
    }

    /**
     * @param PaginateRealWeddingRequest $request
     * @return string
     * @throws \Throwable
     */
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

            $weddings = $this->schedule->paginate($this->schedule->filterWedding($minPrice, $maxPrice, $orderByRate), config('define.real_wedding_paginate'), $page);

            return view('user.sections.result_real_wedding', compact('weddings'))->render();
        }
    }

    public function detail(Request $request)
    {
        $schedule = $this->schedule->findById($request->id)->load('tasks.category');

        $tasks = $schedule->tasks;

        $countTask = count($tasks);

        return view('user.detail_real_wedding', compact('schedule', 'tasks', 'countTask'));
    }

    public function copySchedule(Request $request)
    {
        $schedule = $this->schedule->findWithCondition('id', $request->id)->first();

        if (!is_null($schedule)) {

            DB::transaction(function () use ($schedule, $request) {

                $schedule->load('tasks');

                $newSchedule = $this->schedule->create([
                    'schedule_id' => $request->id,
                    'user_id' => Auth::id(),
                    'name' => config('define.schedule_name') . Auth::user()->name,
                    'budget' => $schedule->budget,
                    'type' => config('define.type_schedule.custom'),
                    'slug' => str_slug($schedule->name),
                ]);

                $schedule->tasks->map(function ($item) use ($newSchedule) {

                    $item->schedule_id = $newSchedule->id;

                    return $this->task->create($item->toArray());
                });

                $this->schedule->setScheduleDefault($newSchedule->id);
            });

            return redirect()->route('client.to-do-list');
        }
    }
}
