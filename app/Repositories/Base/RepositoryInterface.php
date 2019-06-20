<?php

namespace App\Repositories\Base;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    public function findById($id);

    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc']);

    public function update($id, $data);

    public function destroy($id);

    public function saveFile($currentFile, $newFile, $path, $width = null, $height = null);

    public function create($data);

    public function updateOrCreate($filter, $data);

    public function paginate($items, $perPage = 5, $page = null, $options = []);

    public function findWithCondition($key, $value, $condition = '=');

    public function timePass($collection);

}
