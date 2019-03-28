<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Topic;
use App\Repositories\Post\PostRepository;
use App\Repositories\Topic\TopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $post;
    protected $topic;

    public function __construct(Post $post, Topic $topic)
    {
        $this->post = new PostRepository($post);
        $this->topic = new TopicRepository($topic);
    }

    public function index()
    {
        $recommendPost = $this->post->getMostRatePost(config('define.post.recommend'))->first();

        $newestPosts = $this->post->getMostRatePost(config('define.post.newest'), config('define.post.recommend'), $recommendPost->id);

        $recentlyPosts = $this->post->getNewestPostsPaginate(config('define.post.paginate'), config('define.post.no_paginate'), $newestPosts);

        $mostPopularPosts = $this->post->getNewestPostsPaginate(config('define.post.most_popular'), config('define.post.no_skip'), $recentlyPosts);

        $topics = $this->topic->checkImageCollection($this->topic->getData(['media']), config('define.post.topic.path'), config('define.post.topic.default_image'));

        return view('user.post', compact('recommendPost', 'newestPosts', 'recentlyPosts', 'mostPopularPosts', 'topics'));
    }

    public function loadPostScrollPaginate(Request $request)
    {
        $recentlyPosts = $this->post->getNewestPostsPaginate(config('define.post.paginate'), $request->skip);

        if ($request->ajax()) {
            return view('user.sections.post-paginate-scroll', compact('recentlyPosts'))->render();
        }
    }

    public function detailPost(Request $request)
    {
        $mostPopularPosts = $this->post->getNewestPostsPaginate(config('define.post.most_popular'), config('define.post.no_skip'));

        $topics = $this->topic->checkImageCollection($this->topic->getData(['media']), config('define.post.topic.path'), config('define.post.topic.default_image'));

        $post = $this->post->getData(['medias', 'topic'], ['id' => $request->id]);

        $post = $this->post->checkAvatarOfUserPostCollection($post, config('asset.users.avatar'), config('asset.user_default'))->first();

        return view('user.detail_post', compact('mostPopularPosts', 'topics', 'post'));
    }
}
