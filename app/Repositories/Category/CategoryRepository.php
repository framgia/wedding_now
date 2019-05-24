<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Base\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getDataPluck()
    {
        $categories = Category::all()->pluck('name', 'id');

        return $categories;
    }

    public function getCategoriesWithCountTasks($scheduleId)
    {
        $result = $this->model->withCount(['tasks' => function ($query) use ($scheduleId) {
            $query->where('schedule_wedding_id', $scheduleId);
        }])->with(['tasks' => function ($query) use ($scheduleId) {
            $query->where('schedule_wedding_id', $scheduleId);
        }])->get();

        return $result;
    }

    public function getItem($id)
    {
        $items = $this->model->find($id)->items()->with('user')->get();

        return $items;
    }

    public function getItemNearUser($id)
    {
        $itemsNearUser = $this->model->find($id)->items()->whereHas('locations.district.city', function ($q) {
            $q->where('name', Auth::user()->locations[0]->district->city->name);
        })->with('user')->get();

        return $itemsNearUser;
    }
}
