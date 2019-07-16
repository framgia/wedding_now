<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Client\TaskRequest;
use App\Http\Requests\Client\UpdateDateMyTimeLineRequest;
use App\Http\Requests\Client\UpdateNoteMyTimeLineRequest;
use App\Http\Requests\Client\UpdatePriorityMyTimeLineRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\TimeFrame\TimeFrameRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    private $task;
    protected $timeFrame;
    protected $category;

    public function __construct(
        TaskRepositoryInterface $task,
        TimeFrameRepositoryInterface $timeFrame,
        CategoryRepositoryInterface $category
    ) {
        $this->task = $task;
        $this->timeFrame = $timeFrame;
        $this->category = $category;
    }

    public function getSingleTask($id)
    {
        $task = $this->task->findById($id)
            ->load('items.medias', 'items.pivot.user', 'items.pivot.location.district');

        $timeFrames = $this->timeFrame->getDataPluck();

        $categories = $this->category->getDataPluck();

        return view('user.sections.single_task', compact('timeFrames', 'categories', 'task'))->render();
    }

    public function updateStatusTask($id)
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

    public function updateNoteTimeLine(UpdateNoteMyTimeLineRequest $request)
    {
        if ($request->ajax()) {

            $id = $request->id;

            $this->task->update($id, [
                'note' => $request->note,
            ]);
        }
    }

    public function updateDateTimeLine(UpdateDateMyTimeLineRequest $request)
    {
        if ($request->ajax()) {

            $id = $request->id;

            $this->task->update($id, [
                'time_occurs' => $request->date,
            ]);
        }
    }

    public function updatePriorityTimeLine(UpdatePriorityMyTimeLineRequest $request)
    {
        if ($request->ajax()) {

            $id = $request->id;

            $this->task->update($id, [
                'priority' => $request->priority,
            ]);
        }
    }

    public function updateTask(TaskRequest $request)
    {
        $this->task->update($request->id, [
            'name' => $request->name,
            'time_frame_id' => $request->time_frame_id,
            'category_id' => $request->update_category_id,
            'priority' => $request->priority,
            'note' => $request->note,
            'item_id' => (int) $request->item_id,
            'time_occurs' => $request->time_occurs,
        ]);

        return response()->json([
            'message' => trans('base.success'),
        ]);
    }

    public function createTask(TaskRequest $request)
    {
        $scheduleWeddingId = $this->meta->getChosenSchedule()->schedule_wedding_id;

        $scheduleWedding = $this->scheduleWedding->findById($scheduleWeddingId);

        $this->task->create([
            'name' => $request->name,
            'priority' => $request->priority,
            'category_id' => (int) $request->category_id,
            'note' => $request->note,
            'time_frame_id' => $request->time_frame_id,
            'time_occurs' => $request->time_occurs,
            'schedule_wedding_id' => $scheduleWedding->id,
            'item_id' => (int) $request->item_id,
        ]);
    }
}
