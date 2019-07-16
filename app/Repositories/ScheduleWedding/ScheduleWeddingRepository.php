<?php

namespace App\Repositories\ScheduleWedding;

use App\Models\ScheduleWedding;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ScheduleWeddingRepository extends BaseRepository implements ScheduleWeddingRepositoryInterface
{
    public function __construct(ScheduleWedding $scheduleWedding)
    {
        parent::__construct($scheduleWedding);
    }

    public function getSchedule($userId, $scheduleId, $type)
    {
        $schedules = $this->model->when($userId, function ($query) use ($userId, $type) {
            $query->where('user_id', '=', $userId)->where('type', '=', $type)
                ->orderBy('created_at', 'desc')
                ->withCount('tasks')
                ->get()->load('scheduleMetasPluck', 'user.media', 'imgMain', 'location');
        }, function ($query) use ($scheduleId) {
            $query->withCount('tasks')
                ->where('id', '=', $scheduleId)
                ->firstOrFail()->load('scheduleMetasPluck', 'user.media', 'imgMain', 'location');
        })->get();

        return $schedules;
    }

    public function getScheduleDefault($with = [])
    {
        return $this->model->with($with)
            ->withCount('tasks')->whereType(config('define.type_schedule.default'))->get();
    }

    public function getScheduleInAdmin($with = [], $withCount = [], $condition = [])
    {
        return $this->model->with($with)
            ->withCount($withCount)->where($condition[0], $condition[1], $condition[2])->get();
    }

    public function store($data)
    {
        $data['user_id'] = Auth::id();
        $data['type'] = config('define.type_schedule.custom');
        $data['slug'] = str_slug($data['name']);

        return $this->model->create($data);
    }

    public function getAllScheduleDefault()
    {
        $schedule = $this->model->withCount('tasks')
            ->where('type', config('define.type_schedule.default'))
            ->get();

        return $schedule;
    }

    public function filterWedding($minPrice = null, $maxPrice = null, $orderByRate = null)
    {
        $weddings = $this->model->isWeddingUser()->with('scheduleMetasPluck', 'medias', 'user', 'location')
            ->withCount('tasks')
            ->where('final_cost', '>', config('define.zero'))
            ->when($minPrice != null, function ($query) use ($minPrice) {

                return $query->where('final_cost', '>=', $minPrice);
            })
            ->when($maxPrice != null, function ($query) use ($maxPrice) {

                return $query->where('final_cost', '<=', $maxPrice);
            })
            ->orderBy('created_at', 'desc')->get();

        $weddings = $this->checkImageWedding($weddings, config('asset.users.images.user_wedding'), config('define.wedding.default_image'));

        return $this->timePass($weddings);
    }

    public function getPackages($limit)
    {
        $packages = $this->model->isPackage()
            ->has('tasks')
            ->with('imgMain', 'tasks.category')
            ->take($limit)
            ->get();

        $packages = $this->checkImageWedding($packages, config('asset.package'), 'package.jpg');

        return $packages;
    }

    public function getPackage($id)
    {
        $package = $this->model->with('imgMain', 'tasks.category')
            ->whereId($id)
            ->firstOrFail();

        return $package;
    }

    public function checkImageWedding($collection, $basePath, $pathDefault)
    {
        $newCollection = $collection->transform(function ($item) use ($basePath, $pathDefault) {

            $value = '';

            if (count($item->medias)) {

                $item->medias->each(function ($media) use (&$item, $basePath, $pathDefault) {

                    if (File::exists($basePath . $media->name)) {

                        $item->image = $media->name;

                        return false;
                    } else {

                        $item->image = $pathDefault;
                    }
                });
            } else {

                $item->image = $pathDefault;
            }

            return $item;
        });

        return $newCollection;
    }

    public function getLocationOfSchedule($schedule)
    {
        // TODO: Implement getLocationOfSchedule() method.
    }


    public function getSuggestion()
    {
        return $this->model->whereType(config('define.type_schedule.suggest'))
            ->firstOrFail()
            ->load('tasks.timeFrame');
    }
}
