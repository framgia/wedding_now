<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ScheduleRequest;
use App\Http\Requests\Client\UpdateSchedulePicture;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Repositories\Location\LocationRepositoryInterface;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\TimeFrame\TimeFrameRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function __construct(
        ScheduleRepositoryInterface $schedule,
        TaskRepositoryInterface $task,
        CategoryRepositoryInterface $category,
        TimeFrameRepositoryInterface $timeFrame,
        ItemRepositoryInterface $item,
        ScheduleMetaRepositoryInterface $meta,
        MediaRepositoryInterface $media,
        LocationRepositoryInterface $location
    ) {
        $this->category = $category;
        $this->schedule = $schedule;
        $this->task = $task;
        $this->timeFrame = $timeFrame;
        $this->item = $item;
        $this->meta = $meta;
        $this->media = $media;
        $this->location = $location;
    }

    public function toDo()
    {
        $scheduleWeddings = $this->schedule->getSchedule(Auth::id(), null, config('define.type_schedule.custom'))->sortByDesc('created_at');

        $mainSchedule = $this->schedule->getScheduleDefault(Auth::user());

        if (is_null($mainSchedule)) {

            return redirect()->route('client.home');
        }

        $timeFrames = $this->timeFrame->getDataPluck();

        $categories = $this->category->getDataPluck();

        $categoriesWithCountTasks = $this->category->getCategoriesWithCountTasks($mainSchedule->id);

        $totalTasks = $this->task->getTasksBySchedule($mainSchedule->id, null);

        $doneTasks = $totalTasks->where('status', config('define.done'));

        return view('user.to_do_list', compact('timeFrames', 'categories', 'scheduleWeddings', 'mainSchedule', 'categoriesWithCountTasks', 'totalTasks', 'doneTasks'));
    }

    public function getToDoList(Request $request)
    {
        if (isset($request->id_choose)) {

            $this->schedule->setScheduleDefault($request->id_choose);
        }

        $scheduleId = $this->schedule->getScheduleDefault(Auth::user())->id;

        $tasks = $this->task->getTasksBySchedule($scheduleId, $request->category_id, $request->status);

        return view('user.sections.list_tasks', compact('tasks'));
    }

    public function chooseTypeSchedule(Request $request)
    {
        $schedule_id = null;

        $type = $request->type;

        $date = Carbon::now();

        switch ($type) {

            case config('define.type_schedule.default'): {
                    $schedule_id = $this->scheduleWedding->getScheduleWeddingDefault()->id;

                    DB::transaction(function () use ($schedule_id, $type, $date) {

                        $schedule = $this->schedule->create([
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
                                'time_occurs' => $date->addDays($task->timeFrame->value),
                            ]);
                        }
                    });

                    break;
                }
            case config('define.type_schedule.custom'): {
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

        return redirect('to-do-list');
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
        $defaultSchedule = $this->schedule->getScheduleDefault(Auth::user());

        if ($defaultSchedule) {

            $defaultSchedule->load('scheduleMetas', 'user.media', 'location');
        }

        $myName = $defaultSchedule->scheduleMetas->filter(function ($item, $key) {
            return $item->key == 'my_name';
        })->first()->value ?? Auth::user()->name;

        $partnerName = $defaultSchedule->scheduleMetas->filter(function ($item, $key) {
            return $item->key == 'my_name';
        })->first()->value ?? __('page.schedule_info.partner');

        $scheduleName = $defaultSchedule->name;

        $myAvatar = config('define.avatar_default');

        $partnerAvatar = config('define.avatar_default');

        if (empty($defaultSchedule->scheduleMetas)) {

            $myAvatar = $defaultSchedule->scheduleMetas->filter(function ($item, $key) {
                return $item->key == 'my_avatar';
            })->first()->value;

            $partnerAvatar = $defaultSchedule->scheduleMetas->filter(function ($item, $key) {
                return $item->key == 'partner_avatar';
            })->first()->value;
        }

        $totalTasks = $this->task->getTasksBySchedule($defaultSchedule->id, null);

        $doneTasks = $totalTasks->where('done', config('define.done'))->count();

        $totalTasks = count($totalTasks);

        $notDoneTasks = $totalTasks - $doneTasks;

        return view('user.schedule_info', compact('myName', 'partnerName', 'myAvatar', 'partnerAvatar', 'scheduleName', 'totalTasks', 'doneTasks', 'notDoneTasks'));
    }

    public function getScheduleInfo()
    {
        $defaultSchedule = $this->schedule->getScheduleDefault(Auth::user());

        if ($defaultSchedule) {

            $defaultSchedule->load('user', 'scheduleMetas', 'imgMain', 'location');
        }

        return $defaultSchedule;
    }

    public function changePicture(UpdateSchedulePicture $request)
    {
        DB::transaction(function () use ($request) {

            $defaultSchedule = $this->schedule->getScheduleDefault(Auth::user());

            $file_name = $this->scheduleWedding->saveFile('', $request->img_schedule, config('asset.schedule'), 276, 276, false);

            $this->media->saveMediaOfSchedule($defaultSchedule, [
                'name' => $file_name,
            ]);
        });
    }

    public function updateSchedule(ScheduleRequest $request)
    {
        $schedule = $this->schedule->getScheduleDefault(Auth::user());

        DB::transaction(function () use ($schedule, $request) {

            $this->schedule->update($schedule->id, [
                'marriage_day' => $request->wedding_date,
            ]);

            $my_avatar = null;

            $partner_avatar = null;

            if ($request->my_avatar) {

                $my_avatar = $this->schedule
                    ->saveFile(null, $request->my_avatar, config('asset.schedule_avatar'), 100, 100, false);
            }
            if ($request->partner_avatar) {

                $partner_avatar = $this->schedule
                    ->saveFile(null, $request->partner_avatar, config('asset.schedule_avatar'), 100, 100, false);
            }

            $this->meta->updateMetas($schedule->id, [
                'my_name' => $request->my_name,
                'my_avatar' => $my_avatar,
                'partner_name' => $request->partner_name,
                'partner_avatar' => $partner_avatar,
            ]);

            if ($schedule->location) {

                $this->location->updateLocationOfSchedule($schedule, [
                    'address' => $request->venue,
                ]);
            } else {

                $this->location->createLocationOfSchedule($schedule, [
                    'address' => $request->venue,
                    'district_id' => $request->district,
                ]);
            }
        });
    }

    public function destroy()
    {
        $scheduleId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        DB::transaction(function () use ($scheduleId) {

            $this->schedule->destroy($scheduleId);
        });

        return response()->json([
            'message' => trans('base.success')
        ]);
    }

    public function myTimeline(Request $request)
    {
        $orderByDate = $request->orderByDate;

        $orderByPriority = $request->orderByPriority;

        $schedule =  $this->schedule->getScheduleDefault(Auth::user());

        if ($schedule) {

            $schedule->load('tasks.category');
        }

        $tasks = $this->task->getTasksBySchedule($schedule->id, null, null, $orderByDate, $orderByPriority);

        return view('user.sections.timeline', compact('schedule', 'tasks'));
    }

    public function selectScheduleDefault(Request $request)
    {
        $schedule = $this->schedule->findById($request->select_schedule)->load('tasks');

        $schedule->user_id = Auth::id();

        $schedule->name = config('define.schedule_name') . Auth::user()->name;

        $schedule->type = config('define.type_schedule.custom');

        $schedule->slug = str_slug($schedule->name);

        $newSchedule = $this->schedule->create($schedule->toArray());

        $schedule->tasks->map(function ($item) use ($newSchedule) {

            $item->schedule_wedding_id = $newSchedule->id;

            return $this->task->create($item->toArray());
        });

        $this->schedule->setScheduleDefault($newSchedule->id);

        return redirect()->route('client.to-do-list');
    }
}
