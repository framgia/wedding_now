<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->orderBy($attribute[0], $attribute[1])
            ->get();
    }

    public function findById(int $id)
    {
        return $this->model->whereId($id)->firstOrFail();
    }

    public function update($id, $data)
    {
        $model = $this->findById($id);

        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->findById($id);

        return $model->delete();
    }
}
