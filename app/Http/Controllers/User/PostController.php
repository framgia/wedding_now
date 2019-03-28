<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = new PostRepository($post);
    }

    public function index()
    {
        $recommendPost = $this->post->getMostRatePost(config('define.post.recommend'));

        $recommendPost = $recommendPost[0];

        $newestPosts = $this->post->getMostRatePost(config('define.post.newest'), config('define.post.recommend'), $recommendPost->id);

        $recentlyPosts = $this->post->getNewestPostsPaginate(config('define.post.paginate'), config('define.post.no_paginate'), $newestPosts);

        $mostPopularPosts = $this->post->getNewestPostsPaginate(config('define.post.most_popular'), config('define.post.no_skip'), $recentlyPosts);

        return view('user.post',  compact('recommendPost', 'newestPosts', 'recentlyPosts', 'mostPopularPosts'));
    }

    public function loadPostScrollPaginate(Request $request)
    {
        $recentlyPosts = $this->post->getNewestPostsPaginate(config('define.post.paginate'), $request->skip);

        if ($request->ajax()) {
            return view('user.sections.post-paginate-scroll', compact('recentlyPosts'))->render();
        }
    }
}
