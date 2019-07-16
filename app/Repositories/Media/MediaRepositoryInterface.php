<?php

namespace App\Repositories\Media;

use App\Repositories\Base\RepositoryInterface;

interface MediaRepositoryInterface extends RepositoryInterface
{
    public function saveMediaOfSchedule($schedule, $data);

    public function saveAvatarOfUser($user, $data);

    public function updateAvatarOfUser($user, $data);

    public function getImagePostUploadOfUser();
}
