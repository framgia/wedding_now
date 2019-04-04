<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ScheduleRequest;
use App\Http\Requests\Client\TaskRequest;
use App\Http\Requests\Client\UpdateSchedulePicture;
use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use App\Models\Media;
use App\Models\ScheduleMeta;
use App\Models\ScheduleWedding;
use App\Models\Task;
use App\Models\TimeFrame;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Item\ItemRepository;
use App\Repositories\Location\LocationRepository;
use App\Repositories\Media\MediaRepository;
use App\Repositories\ScheduleMeta\ScheduleMetaRepository;
use App\Repositories\ScheduleWedding\ScheduleWeddingRepository;
use App\Repositories\Task\TaskRepository;
use App\Repositories\TimeFrame\TimeFrameRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    protected $category;
    protected $scheduleWedding;
    protected $task;
    protected $timeFrame;
    protected $item;
    protected $meta;
    protected $media;
    protected $location;

    public function __construct(ScheduleWedding $scheduleWedding, Task $task, Category $category, TimeFrame $timeFrame, Item $item, ScheduleMeta $meta, Media $media, Location $location)
    {
        $this->category = new CategoryRepository($category);

        $this->scheduleWedding = new ScheduleWeddingRepository($scheduleWedding);

        $this->task = new TaskRepository($task);

        $this->timeFrame = new TimeFrameRepository($timeFrame);

        $this->item = new ItemRepository($item);

        $this->meta = new ScheduleMetaRepository($meta);

        $this->media = new MediaRepository($media);

        $this->location = new LocationRepository($location);
    }

    public function checkIssetSchedule()
    {
        $scheduleWeddings = $this->scheduleWedding->getScheduleClient(Auth::id(), null);

        if (count($scheduleWeddings) == 1) {

            $this->meta->setChosenSchedule($scheduleWeddings[0]->id);
        }

        return $scheduleWeddings;
    }

    public function toDo()
    {
        $scheduleWeddings = $this->checkIssetSchedule();

        if (count($scheduleWeddings) == 0 || !$this->meta->getChosenSchedule()) {

            $default = config('define.type_schedule.default');

            $custom = config('define.type_schedule.custom');

            $combo = config('define.type_schedule.combo');

            return view('user.list-schedule', compact('scheduleWeddings', 'default', 'custom', 'combo'));
        }

        $timeFrames = $this->timeFrame->getDataPluck();

        $categories = $this->category->getDataPluck();

        return view('user.to-do-list', compact('timeFrames', 'categories', 'scheduleWeddings'));
    }

    public function getToDoList(Request $request)
    {
        if (isset($request->id_choose)) {

            $this->meta->setChosenSchedule($request->id_choose);
        }

        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        $tasks = $this->task->getTasksBySchedule($scheduleId, $request->category_id, $request->status);

        $categories = $this->category->getDataPluck();

        return view('user.sections.list_tasks', compact('tasks', 'categories'))->render();
    }

    public function createTask(TaskRequest $request)
    {
        $scheduleWeddingId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        $scheduleWedding = $this->scheduleWedding->findById($scheduleWeddingId);

        $task = $this->task->create([
            'name' => $request->name,
            'priority' => $request->priority,
            'category_id' => (int)$request->category_id,
            'note' => $request->note,
            'time_frame_id' => $request->time_frame_id,
            'time_occurs' => $request->time_occurs,
            'schedule_wedding_id' => $scheduleWedding->id,
            'item_id' => (int)$request->item_id,
        ]);

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function updateTask(TaskRequest $request)
    {
        $this->task->update($request->id, [
            'name' => $request->name,
            'time_frame_id' => $request->time_frame_id,
            'category_id' => $request->update_category_id,
            'priority' => $request->priority,
            'note' => $request->note,
            'item_id' => (int)$request->item_id,
            'time_occurs' => $request->time_occurs,
        ]);

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function updateStatusTask(Request $request, $id)
    {
        try {
            $task = $this->task->findById($id);
            $status = (!$task->status || $task->status == 0) ? config('define.done') : config('define.to_do');

            $task->status = $status;
            $task->save();

            return response()->json([
                'message' => __('base.success'),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => __('base.fail'),
            ]);
        }
    }

    public function deleteTask($id)
    {
        $this->task->destroy($id);

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function getItemByCategory(Request $request)
    {
        return $this->item->getItemByCategory($request->id, $request->status);
    }

    public function getItem(Request $request)
    {
        $items = $this->category->getItem($request->id);
        $itemsNearUser = $this->category->getItemNearUser($request->id);

        return view('user.sections.product_modal', compact('items', 'itemsNearUser'));
    }

    public function getSingleTask($id)
    {
        $task = $this->task->findById($id);
        $timeFrames = $this->timeFrame->getDataPluck();
        $categories = $this->category->getDataPluck();

        return view('user.sections.single-task', compact('timeFrames', 'categories', 'task'))->render();
    }

    public function chooseTypeSchedule(Request $request)
    {
        $schedule_id = null;

        $type = $request->type;

        switch ($type) {
            case config('define.type_schedule.default'):
                {
                    $schedule_id = $this->scheduleWedding->getScheduleWeddingDefault()->id;

                    DB::transaction(function () use ($schedule_id, $type) {

                        $schedule = $this->scheduleWedding->create([
                            'name' => config('define.wedding.of') . Auth::user()->name,
                            'slug' => config('define.wedding.slug') . str_slug(Auth::user()->name),
                            'user_id' => Auth::id(),
                            'type' => $type,
                            'budget' => 0,
                            'schedule_wedding_id' => $schedule_id,
                        ]);

                        $this->meta->setChosenSchedule($schedule->id);

                        $defaultTasks = $this->task->getTasksBySchedule($schedule_id, null);

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

                    break;
                }
            case config('define.type_schedule.custom'):
                {
                    $schedule = $this->scheduleWedding->create([
                        'name' => config('define.wedding.of') . Auth::user()->name,
                        'slug' => config('define.wedding.slug') . str_slug(Auth::user()->name),
                        'user_id' => Auth::id(),
                        'type' => $type,
                        'budget' => 0,
                    ]);

                    $this->meta->setChosenSchedule($schedule->id);

                    break;
                }
        }
    }

    public function getCategoryFilter()
    {
        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        $categoriesWithCountTasks = $this->category->getCategoriesWithCountTasks($scheduleId);

        $totalTasks = $this->task->getTasksBySchedule($scheduleId, null);

        $doneTasks = $totalTasks->where('status', config('define.done'));

        return view('user.sections.category_filter', compact('categoriesWithCountTasks', 'totalTasks', 'doneTasks'))->render();
    }

    public function scheduleInfoView()
    {
        $scheduleWeddings = $this->checkIssetSchedule();

        if (count($scheduleWeddings) == 0 || !$this->meta->getChosenSchedule()) {

            $default = config('define.type_schedule.default');

            $custom = config('define.type_schedule.custom');

            $combo = config('define.type_schedule.combo');

            return view('user.list-schedule', compact('scheduleWeddings', 'default', 'custom', 'combo'));
        }

        $totalTasks = $this->task->getTasksBySchedule($this->meta->getChosenSchedule()->schedule_wedding_id, null);

        $doneTasks = $totalTasks->where('done', config('define.done'))->count();

        $totalTasks = count($totalTasks);

        $notDoneTasks = $totalTasks - $doneTasks;

        return view('user.schedule_info', compact('totalTasks', 'doneTasks', 'notDoneTasks'));
    }

    public function getScheduleInfo()
    {
        $id = $this->meta->getChosenSchedule()->schedule_wedding_id;

        $schedule = $this->scheduleWedding->getScheduleClient(null, $id);

        return $schedule;
    }

    public function changePicture(UpdateSchedulePicture $request)
    {
        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        DB::transaction(function () use ($scheduleId, $request) {

            $schedule = $this->scheduleWedding->findById($scheduleId);

            $file_name = $this->scheduleWedding->saveFile(null, $request->img_schedule, config('asset.schedule'), 276, 276);

            $this->media->saveMediaOfSchedule($schedule, [
                'name' => $file_name,
            ]);
        });

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function updateSchedule(ScheduleRequest $request)
    {
        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        DB::transaction(function () use ($scheduleId, $request) {

            $this->scheduleWedding->update($scheduleId, [
                'marriage_day' => $request->wedding_date,
            ]);

            $my_avatar = null;

            $partner_avatar = null;

            if ($request->my_avatar) {
                $my_avatar = $this->scheduleWedding
                    ->saveFile(null, $request->my_avatar, config('asset.schedule_avatar'), 100, 100);
            }
            if ($request->partner_avatar) {
                $partner_avatar = $this->scheduleWedding
                    ->saveFile(null, $request->partner_avatar, config('asset.schedule_avatar'), 100, 100);
            }

            $keyValues = [
                'my_name' => $request->my_name,
                'my_identity' => $request->my_identity,
                'my_avatar' => $my_avatar,
                'partner_name' => $request->partner_name,
                'partner_identity' => $request->partner_identity,
                'partner_avatar' => $partner_avatar,
            ];

            $this->meta->updateMetas($scheduleId, $keyValues);

            $schedule = $this->scheduleWedding->findById($scheduleId);

            if ($this->location->getLocationOfSchedule($schedule)) {
                $this->location->updateLocationOfSchedule($schedule, [
                    'address' => $request->venue,
                ]);
            } else {
                $this->location->createLocationOfSchedule($schedule, [
                    'address' => $request->venue,
                    'district_id' => $request->district
                ]);
            }
        });

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function planningPackage()
    {
        // return view('user.planning-package');
    }

    public function suggestions()
    {
        $scheduleWedding = $this->scheduleWedding->getData(['tasks.timeFrame'], ['type' => 'suggest'])->first();
        $time = Carbon::now()->addDays(config('define.days'));

        return view('user.planning-suggest', compact('scheduleWedding', 'time'));
    }

    public function store(Request $request)
    {
        $schedule = $this->scheduleWedding->store($request->all());
        foreach ($request->task_name as $key => $taskName) {
            $data = [
                'name' => $taskName,
                'priority' => 1,
                'category_id' => $request->category[$key],
                'time_frame_id' => 1,
                'schedule_wedding_id' => $schedule->id,
                'price' => (int)($request->price[$key]),
                'note' => $request->task_note[$key]
            ];
            $this->task->create($data);
        };
        Session::forget('schedule_id');
        Session::put('schedule_id', $schedule->id);

        return redirect('to-do-list');
    }

    public function destroy()
    {
        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        DB::transaction(function () use ($scheduleId) {

            $this->scheduleWedding->destroy($scheduleId);
        });

        return response()->json([
            'message' => trans('base.success')
        ]);
    }

    public function getScheduleTask($id)
    {
        $schedule = $this->scheduleWedding->findById($id)->load('tasks.category');
        $tasks = $schedule->tasks;
        $countTask = count($tasks);

        return view('user.timeline', compact('schedule', 'tasks', 'countTask'));
    }

    public function myTimeline()
    {
        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;
        if (!isset($scheduleId)) {
            return redirect()->route('client.to-do-list');
        }

        return $this->getScheduleTask($scheduleId);
    }

    public function timeline($slug)
    {
        $id = last(explode('-', $slug));

        return $this->getScheduleTask($id);
    }
}
