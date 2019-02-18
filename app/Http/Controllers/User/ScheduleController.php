<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\TaskRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\ScheduleWedding;
use App\Models\Task;
use App\Models\TimeFrame;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Item\ItemRepository;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepository;
use App\Repositories\Task\TaskRepository;
use App\Repositories\TimeFrame\TimeFrameRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    protected $categories;
    protected $scheduleWedding;
    protected $task;
    protected $timeFrame;
    protected $item;

    public function __construct(ScheduleWedding $scheduleWedding, Task $task, Category $category, TimeFrame $timeFrame, Item $item)
    {
        $this->categories = new CategoryRepository($category);

        $this->scheduleWedding = new ScheduleWeddingRepository($scheduleWedding);

        $this->task = new TaskRepository($task);

        $this->timeFrame = new TimeFrameRepository($timeFrame);

        $this->item = new ItemRepository($item);
    }

    public function toDo()
    {
        $scheduleWeddings = $this->scheduleWedding->getScheduleClient(Auth::id(), null);

        if (count($scheduleWeddings) == 1) {

            Session::put('schedule_id', $scheduleWeddings[0]->id);
        }

        $scheduleId = Session::get('schedule_id');

        if (count($scheduleWeddings) == 0 || !Session::has('schedule_id')) {

            $default = config('define.type_schedule.default');

            $custom = config('define.type_schedule.custom');

            $combo = config('define.type_schedule.combo');

            return view('user.list-schedule', compact('scheduleWeddings', 'default', 'custom', 'combo', 'scheduleWeddingId'));
        }

        $timeFrames = $this->timeFrame->getDataPluck();

        $categories = $this->categories->getDataPluck();

        $categoriesWithCountTasks = $this->categories->getCategoriesWithCountTasks($scheduleId);

        $totalTasks = $this->task->getTasksBySchedule($scheduleId);

        return view('user.to-do-list', compact('timeFrames', 'categories', 'scheduleWeddingId', 'categoriesWithCountTasks', 'totalTasks'));
    }

    public function getToDoList(Request $request)
    {
        if (isset($request->id_choose)) {

            Session::put('schedule_id', $request->id_choose);
        }

        $scheduleId = Session::get('schedule_id');

        $scheduleWedding = $this->scheduleWedding->getScheduleClient(null, $scheduleId);

        $tasks = $this->task->getTasksBySchedule($scheduleWedding->id);

        $categories = $this->categories->getDataPluck();

        return view('user.sections.list_tasks', compact('tasks', 'categories'))->render();
    }

    public function createTask(TaskRequest $request)
    {
        $scheduleWeddingId = Session::get('schedule_id');

        $scheduleWedding = $this->scheduleWedding->findById($scheduleWeddingId);

        $task = $this->task->create([
            'name' => $request->name,
            'priority' => $request->priority,
            'category_id' => $request->category_id,
            'note' => $request->note,
            'time_frame_id' => $request->time_frame_id,
            'time_occurs' => $request->time_occurs,
            'schedule_wedding_id' => $scheduleWedding->id,
            'item_user_id' => $request->item_user_id,
        ]);

        return $task;
    }

    public function updateTask(TaskRequest $request)
    {
        $this->task->update($request->id, [
            'name' => $request->name,
            'time_frame_id' => $request->time_frame_id,
            'category_id' => $request->category_id,
            'priority' => $request->priority,
            'item_user_id' => $request->item,
            'note' => $request->note,
        ]);

        return response()->json([
            'message' => trans('admin.success'),
        ]);
    }

    public function deleteTask($id)
    {
        $this->task->destroy($id);

        return response()->json([
            'message' => trans('admin.success'),
        ]);
    }

    public function getItemByCategory(Request $request)
    {
        return $this->item->getItemByCategory($request->id);
    }

    public function getSingleTask($id)
    {
        $task = $this->task->findById($id);
        $timeFrames = $this->timeFrame->getDataPluck();
        $categories = $this->categories->getDataPluck();

        return view('user.sections.single-task', compact('timeFrames', 'categories', 'task'))->render();
    }

    public function chooseTypeSchedule(Request $request)
    {
        $schedule_id = null;

        $type = $request->type;

        if ($type == config('define.type_schedule.default')) {

            $schedule_id = $this->scheduleWedding->getScheduleWeddingDefault()->id;

            DB::transaction(function () use ($schedule_id, $type) {

                $schedule = $this->scheduleWedding->create([
                    'name' => config('define.wedding.of') . Auth::user()->name,
                    'slug' => config('define.wedding.slug') . Auth::user()->name,
                    'user_id' => Auth::id(),
                    'type' => $type,
                    'budget' => 0,
                    'schedule_wedding_id' => $schedule_id,
                ]);

                Session::put('schedule_id', $schedule->id);

                $defaultTasks = $this->task->getTasksBySchedule($schedule_id);

                foreach ($defaultTasks as $task) {
                    $this->task->create([
                        'name' => $task->name,
                        'priority' => $task->priority,
                        'category_id' => $task->category_id,
                        'item_user_id' => $task->item_user_id,
                        'time_frame_id' => $task->time_frame_id,
                        'schedule_wedding_id' => $schedule->id,
                    ]);
                }
            });
        }
    }
}
