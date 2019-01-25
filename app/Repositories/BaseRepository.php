<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

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

    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->orderBy($attribute[0], $attribute[1])
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

    public function saveFile($currentFile, $newFile, $path)
    {
        // currentFile: avatar hiện tại
        // newFile: avatar mới
        // path: đường dẫn muốn lưu file
        $name = $newFile->getClientOriginalName();
        $newName = str_random(4) . '_' . $name;
        // kiểm tra xem có trùng tên với các file trên server hay k, nếu có thì random tên khác và nối chuỗi
        while (file_exists($path . $newName)) {
            $newName = str_random(4) . '_' . $name;
        }
        // kiểm tra xem file có tồn tại trên server hay không, nếu có thì xóa
        if (file_exists($path . $currentFile) && $currentFile) {
            unlink($path . $currentFile);
        }
        $newFile->move($path, $newName);

        return $newName;
    }

    public function create($data)
    {
        $model = $this->model->create($data);

        return $model;
    }

    public function slug($str)
    {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);

        return $str;
    }

    public function updateOrCreate($filter, $data)
    {
        return $this->model->updateOrCreate($filter, $data);
    }
}
