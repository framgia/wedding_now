<?php

namespace App\Http\Controllers\User;

use App\Repositories\ScheduleWedding\ScheduleWeddingRepositoryInterface;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    protected $scheduleWedding;

    public function __construct(ScheduleWeddingRepositoryInterface $scheduleWedding)
    {
        $this->scheduleWedding = $scheduleWedding;
    }

    public function suggestion()
    {
        $scheduleWedding = $this->scheduleWedding->getSuggestiion();

        $time = Carbon::now()->addDays(config('define.days'));

        return view('user.planning_suggest', compact('scheduleWedding', 'time'));
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

        return redirect('to-do-list');
    }
}
