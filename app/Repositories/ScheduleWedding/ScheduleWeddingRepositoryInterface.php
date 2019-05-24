<?php

namespace App\Repositories\ScheduleWedding;

use App\Repositories\Base\RepositoryInterface;

interface ScheduleWeddingRepositoryInterface extends RepositoryInterface
{
    public function deleteTasks($data = []);

    public function getScheduleWeddingDefault();

    public function getScheduleClient($userId, $scheduleId);

    public function store($data);

    public function getAllScheduleDefault();

    public function filterWedding($minPrice = null, $maxPrice = null, $orderByRate = null);

    public function getPackages($limit);

    public function getPackage($id);

    public function timePass($collection);

    public function checkImageWedding($collection, $basePath, $pathDefault);
}
