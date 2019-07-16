<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getDataPluck()
    {
        $categories = $this->model->all()->pluck('name', 'id');

        return $categories;
    }

    public function getCategoriesWithCountTasks($scheduleId)
    {
        $result = $this->model->with(['tasks' => function ($query) use ($scheduleId) {
            $query->where('schedule_id', $scheduleId);
        }])->get();

        return $result;
    }

    public function getItem($idCategory)
    {
        $items = $this->model->find($idCategory)
            ->items()
            ->with('users', 'locations')->get();

        return $items;
    }

    public function getItemNearUser($idCategory)
    {
        $itemsNearUser = $this->model->find($idCategory)
            ->items()
            ->when(count(Auth::user()->locations) > 0, function ($query) {
                $query->whereHas('locations.district.city', function ($q) {
                    $q->where('name', 'like', '%' . Auth::user()->locations[0]->district->city->name . '%');
                });
            })->with('users', 'locations')->get();

        return $itemsNearUser;
    }

    public function seachItem($idCategory, $keyword, $filterPrice = '')
    {
        $items = $this->model->find($idCategory)
            ->items()
            ->when($keyword != '', function ($query) use ($keyword) {
                $query->where('name', 'like', $keyword . '%')
                    ->when(count(Auth::user()->locations) > 0, function ($query) use ($keyword) {
                        $query->orWhereHas('locations.district.city', function ($query) use ($keyword) {
                            $query->where('name', 'like', '%' . $keyword . '%');
                        });
                    });
            })->when($filterPrice != '', function ($query) use ($filterPrice) {
                $query->when($filterPrice == config('define.increase'), function ($query) {
                    $query->orderBy('price', 'asc');
                }, function ($query) {
                    $query->orderBy('price', 'desc');
                });
            })->with('users', 'locations')->get();

        return $items;
    }

    public function seachItemsNearUser($idCategory, $keyword, $filterPrice = '')
    {
        $itemsNearUser = $this->model->find($idCategory)
            ->items()
            ->when($keyword != '', function ($query) use ($keyword) {
                $query->where('name', 'like', $keyword . '%')
                    ->when(count(Auth::user()->locations) > 0, function ($query) use ($keyword) {
                        $query->orWhereHas('locations.district.city', function ($query) use ($keyword) {
                            $query->where('name', 'like', '%' . $keyword . '%');
                        });
                    });
            })
            ->when(count(Auth::user()->locations) > 0, function ($query) use ($keyword) {
                $query->whereHas('locations.district.city', function ($q) {
                    $q->where('name', Auth::user()->locations[0]->district->city->name);
                });
            })
            ->when($filterPrice != '', function ($query) use ($filterPrice) {
                $query->when($filterPrice == config('define.increase'), function ($query) {
                    $query->orderBy('price', 'asc');
                }, function ($query) {
                    $query->orderBy('price', 'desc');
                });
            })->with('users', 'locations')->get();

        return $itemsNearUser;
    }
}
