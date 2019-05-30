<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SchedulaDefaultRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\ScheduleWedding;
use App\Models\Task;
use App\Models\TimeFrame;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepository;
use App\Repositories\Task\TaskRepository;
use App\Repositories\TimeFrame\TimeFrameRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleWeddingController extends Controller
{
    protected $scheduleWedding;
    protected $category;
    protected $timeFrame;
    protected $task;

    public function __construct(Category $category, Task $task, TimeFrame $timeFrame, ScheduleWedding $scheduleWedding)
    {
        $this->scheduleWedding = new ScheduleWeddingRepository($scheduleWedding);
        $this->category = new CategoryRepository($category);
        $this->timeFrame = new TimeFrameRepository($timeFrame);
        $this->task = new TaskRepository($task);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduleWeddings = ScheduleWedding::with([
            'tasks.category' => function ($query) {
                $query->get();
            },
            'tasks.timeFrame' => function ($query) {
                $query->get();
            },
        ])->withCount('tasks')->where('type', '=', config('define.type.admin'))->get();

        return view('admin.list_default_schedule', compact('scheduleWeddings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_default_schdule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inforSchedule = $request->info_schedule;
        Arr::set($inforSchedule, 'user_id', Auth::id());
        Arr::set($inforSchedule, 'type', config('define.type.admin'));
        Arr::set($inforSchedule, 'slug', $this->scheduleWedding->slug($inforSchedule['name']));

        $arrTasks = $request->arr_tasks;

        DB::transaction(function () use ($arrTasks, $inforSchedule) {
            $scheduleWedding = $this->scheduleWedding->create($inforSchedule);
            foreach ($arrTasks as $task) {
                Arr::set($task, 'schedule_wedding_id', $scheduleWedding->id);
                $this->task->create($task);
            }
        });

        return response()->json([
            'message' => trans('success'),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeFrames = $this->timeFrame->getDataPluck();
        $categories = $this->category->getDataPluck();
        $items = Item::with('users')->get();
        $scheduleWedding = ScheduleWedding::with('tasks')->findOrFail($id);

        return view('admin.edit_default_schdule', compact('scheduleWedding', 'timeFrames', 'categories', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inforSchedule = $request->info_schedule;
        Arr::set($inforSchedule, 'user_id', Auth::id());
        Arr::set($inforSchedule, 'type', config('define.type.admin'));
        Arr::set($inforSchedule, 'slug', $this->scheduleWedding->slug($inforSchedule['name']));
        $arrTasks = $request->arr_tasks;
        $idDeletedTasks = $request->id_deleted_tasks;

        DB::transaction(function () use ($id, $inforSchedule, $arrTasks, $idDeletedTasks) {
            $this->scheduleWedding->update($id, [
                'name' => $inforSchedule['name'],
                'budget' => $inforSchedule['budget'],
                'note' => $inforSchedule['note'],
                'slug' => $inforSchedule['slug'],
            ]);
            if ($arrTasks != '') {
                foreach ($arrTasks as $task) {

                    $this->task->updateOrCreate([
                        'id' => $task['id'],
                    ], [
                        'name' => $task['name'],
                        'category_id' => $task['category_id'],
                        'item_user_id' => $task['item_user_id'],
                        'time_frame_id' => $task['time_frame_id'],
                        'schedule_wedding_id' => $id,
                        'priority' => $task['priority']
                    ]);
                }
            }
            if ($idDeletedTasks != '') {
                foreach ($idDeletedTasks as $id => $value) {
                    $this->task->destroy($value);
                }
            }
        });

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = $this->task->getTasksBySchedule($id);

        DB::transaction(function () use ($tasks, $id) {
            foreach ($tasks as $task) {
                $this->task->destroy($task->id);
            }
            $this->scheduleWedding->destroy($id);
        });

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function scheduleDefaultIndex()
    {
        $timeFrames = $this->timeFrame->getDataPluck();
        $categories = $this->category->getDataPluck();
        $items = Item::with('user')->get();
        $scheduleDefault = $this->scheduleWedding->getScheduleWeddingDefault();

        return view('admin.edit_default_schdule', compact('scheduleDefault', 'timeFrames', 'categories', 'items'));
    }


    public function scheduleDefaultUpdate(SchedulaDefaultRequest $request, $id)
    {
        $infoSchedule = $request->info_schedule;
        Arr::set($infoSchedule, 'user_id', Auth::id());
        Arr::set($infoSchedule, 'type', config('define.type_schedule.default'));
        Arr::set($infoSchedule, 'slug', str_slug($infoSchedule['name']));
        $arrTasks = $request->arr_tasks;
        $idDeletedTasks = $request->id_deleted_tasks;

        DB::transaction(function () use ($id, $infoSchedule, $arrTasks, $idDeletedTasks) {
            $this->scheduleWedding->update($id, [
                'name' => $infoSchedule['name'],
                'budget' => $infoSchedule['budget'],
                'note' => $infoSchedule['note'],
                'slug' => $infoSchedule['slug'],
                'type' => $infoSchedule['type'],
                'user_id' => $infoSchedule['user_id'],
            ]);
            if ($arrTasks != '') {
                foreach ($arrTasks as $task) {
                    $this->task->updateOrCreate([
                        'id' => $task['id'],
                    ], [
                        'name' => $task['name'],
                        'category_id' => $task['category_id'],
                        'item_user_id' => $task['item_user_id'],
                        'time_frame_id' => $task['time_frame_id'],
                        'schedule_wedding_id' => $id,
                        'priority' => $task['priority'],
                        'note' => $task['note'],
                    ]);
                }
            }
            if ($idDeletedTasks != '') {
                foreach ($idDeletedTasks as $id => $value) {
                    $this->task->destroy($value);
                }
            }
        });

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function getTimeFramePluck()
    {
        $timeFrames = $this->timeFrame->getDataPluck();

        return $timeFrames;
    }

    public function getCategoryPluck()
    {
        $categories = $this->category->getDataPluck();

        return $categories;
    }

    public function getItemWithVendorPluckByIdCategory(Request $request)
    {
        $category_id = $request->id;
        
        $items = Item::with('users')
            ->whereHas('categories', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })->get();

        return $items;
    }

    public function getTasks(Request $request)
    {
        $schedule_id = $request->id;
        $tasks = Task::with(['itemUser', 'timeFrame'])
            ->where('schedule_wedding_id', $schedule_id)
            ->get();

        return $tasks;
    }
}
