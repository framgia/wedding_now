<?php

namespace App\Repositories\Media;

use App\Models\Media;
use App\Models\Post;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Auth;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public function __construct(Media $media)
    {
        parent::__construct($media);
    }

    public function saveMediaOfSchedule($schedule, $data)
    {
        $schedule->medias()->create($data);
    }

    public function saveAvatarOfUser($user, $data)
    {
        $user->media()->create($data);
    }

    public function getImagePostUploadOfUser()
    {
        return $this->model->where([
            ['mediaable_type', 'App\Models\Post'],
            ['user_id', Auth::id()],
        ])->get();
    }
}
