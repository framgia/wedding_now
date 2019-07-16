<?php

namespace App\Repositories\Base;

use App\Relations\HasManyThroughBelongsTo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as ResizeImage;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'], $withCount = [])
    {
        return $this->model
            ->select($dataSelect)
            ->with($with)
            ->withCount($withCount)
            ->where($data)
            ->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, $data)
    {
        $model = $this->findById($id);

        return $model->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function saveFile($currentFile, $newFile, $path, $width = null, $height = null, $delete = false)
    {
        if (!File::exists($path)) {

            File::makeDirectory($path);
        }

        $filename = time() . '_' . str_slug($newFile->getClientOriginalName()) . '.' . $newFile->getClientOriginalExtension();

        $file_path = public_path($path . $filename);

        if ($width && $height) {
            ResizeImage::make($newFile->getRealPath())->resize($width, $height)->save($file_path);
        } else {
            ResizeImage::make($newFile->getRealPath())->save($file_path);
        }

        if ($delete) {
            unlink($path . $currentFile);
        }

        return $filename;
    }

    public function create($data)
    {
        $model = $this->model->create($data);

        return $model;
    }

    public function updateOrCreate($filter, $data)
    {
        return $this->model->updateOrCreate($filter, $data);
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function findWithCondition($key, $value, $condition = '=')
    {
        return $this->model->where($key, $condition, $value)->get();
    }

    public function timePass($collection)
    {
        $lang = config('define.en');

        if (!Session::get('lang') || Session::get('lang') === config('define.vn')) {

            $lang = config('define.vi');
        }

        Carbon::setLocale($lang);

        $now = Carbon::now();

        $newCollection = $collection->transform(function ($item) use ($now) {

            $value = $item->created_at->diffForHumans($now);

            $item->time_pass = $value;

            return $item;
        });

        return $newCollection;
    }

    public function hasManyThroughBelongTo($related, $through, $firstKey = null, $secondKey = null)
    {
        $through = new $through;

        $related = new $related;

        $firstKey = $firstKey ?: $this->getForeignKey();

        $secondKey = $secondKey ?: $related->getForeignKey();

        return new HasManyThroughBelongsTo($related->newQuery(), $this, $through, $firstKey, $secondKey);
    }
}
