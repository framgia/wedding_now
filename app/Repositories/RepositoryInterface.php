<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    public function findById($id);

    public function getData();

    public function update($id, $data);

    public function destroy($id);

    public function saveFile($currentFile, $newFile, $path);
}
