<?php

namespace App\Repositories\Post;

use App\Models\Rate;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getAll($with, $withCount)
    {
        return $this->model->withCount($withCount)->with($with)->get();
    }

    public function getMostRatePost($number = null, $numberSkip = null, ...$id)
    {
        $posts = $this->model->with(['medias', 'topic'])
            ->withCount('rates')
            ->orderBy('rates_count', 'desc')
            ->numberStarPost()
            ->orderBy('id', 'desc')
            ->when($id != [], function($query) use ($id) {
                $query->whereNotIn('posts.id', $id);
            })
            ->when($numberSkip != null, function($query) use ($numberSkip) {
                $query->skip($numberSkip);
            })
            ->when($number != null, function($query) use ($number) {
                $query->take($number);
            })
            ->public()
            ->get();

        $posts = $this->checkImageCollection($posts, config('define.post.path'), config('define.post.default_image'));

        return $posts;
    }

    public function getNewestPostsPaginate($paginate, $skip, $posts = null)
    {
        $arrayId = [];

        if ($posts) {

            foreach ($posts as $post) {

                $arrayId[] = $post->id;
            }
        }

        $posts = $this->model->with(['medias', 'topic'])
            ->withCount('rates')
            ->orderBy('id', 'desc')
            ->orderBy('rates_count', 'desc')
            ->when($arrayId != [], function($query) use ($arrayId) {
                $query->whereNotIn('id', $arrayId);
            })
            ->public()
            ->offset($skip)
            ->limit($paginate)
            ->get();

        $posts = $this->checkImageCollection($posts, config('define.post.path'), config('define.post.default_image'));

        return $posts;
    }

    public function checkImageCollection($collection, $basePath, $pathDefault)
    {
        $newCollection = $collection->transform(function($item) use ($basePath, $pathDefault) {

            if ($item->medias) {

                $item->medias->each(function($media) use ($item, $basePath, $pathDefault) {

                    if (File::exists($basePath . $media->name)) {

                        $item->image = $media->name;

                        return false;
                    } else {

                        $item->image = $pathDefault;
                    }
                });
            } else {

                $item->image = $pathDefault;
            }

            return $item;
        });

        return $newCollection;
    }
}
