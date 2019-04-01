<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Auth;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getDataPluck()
    {
        $categories = Category::all()->pluck('name', 'id');

        return $categories;
    }

    public function getCategoriesWithCountTasks($scheduleId)
    {
        $result = Category::withCount(['tasks' => function ($query) use ($scheduleId) {
            $query->where('schedule_wedding_id', $scheduleId);
        }])->with(['tasks' => function ($query) use ($scheduleId) {
            $query->where('schedule_wedding_id', $scheduleId);
        }])->get();

        return $result;
    }

    public function getItem($id)
    {
        $items = Category::find($id)->items()->with('user')->get();

        return $items;
    }

    public function getItemNearUser($id)
    {
        $itemsNearUser = Category::find($id)->items()->whereHas('locations.district.city', function($q) {
            $q->where('name', Auth::user()->locations[0]->district->city->name);
        })->with('user')->get();

        return $itemsNearUser;
    }
}
