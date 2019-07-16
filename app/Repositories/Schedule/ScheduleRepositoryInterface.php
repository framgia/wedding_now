<?php

namespace App\Repositories\Schedule;

use App\Repositories\Base\RepositoryInterface;

interface ScheduleRepositoryInterface extends RepositoryInterface
{
    public function getSchedule($userId, $scheduleId, $type);

    public function store($data);

    public function getAllScheduleDefault();

    public function filterWedding($minPrice = null, $maxPrice = null, $orderByRate = null);

    public function getPackages($limit);

    public function checkImageWedding($collection, $basePath, $pathDefault);

    public function getSuggestion();

    public function getScheduleInAdmin($with = [], $withCount = [], $condition = []);

    public function getScheduleDefault($user);

    public function setScheduleDefault($id);

}
