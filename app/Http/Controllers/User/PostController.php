<?php

namespace App\Http\Controllers\User;

use App\Events\PostWasViewdEvent;
use App\Events\ViewPost;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Topic\TopicRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;
    protected $topic;
    protected $comment;

    public function __construct(
        PostRepositoryInterface $post,
        TopicRepositoryInterface $topic,
        CommentRepositoryInterface $comment
    )
    {
        $this->post = $post;
        $this->topic = $topic;
        $this->comment = $comment;
    }

    public function index()
    {
        $recommendPost = collect($this->post->getMostRatePost([config('define.post.type.thinks')],
            config('define.post.recommend')))->first();

        $newestPosts = collect($this->post->getMostRatePost([config('define.post.type.schedule')],
            config('define.post.newest'), config('define.post.recommend'), [$recommendPost->id]));

        $arrIdNewestPostsIgnore = [];

        $newestPosts->each(function ($post) use (&$arrIdNewestPostsIgnore) {
            array_push($arrIdNewestPostsIgnore, $post->id);
        });

        $mostPopularPosts = $this->post->getMostRatePost([config('define.post.type.item')],
            config('define.post.most_popular'), config('define.post.no_skip'), $arrIdNewestPostsIgnore);

        $recentlyPosts = $this->post->getNewestPostsPaginate(config('define.post.paginate'),
            config('define.post.no_paginate'), $mostPopularPosts);

        $topics = $this->topic->checkImageCollection($this->topic->getData(['media']),
            config('define.post.topic.path'), config('define.post.topic.default_image'));

        return view('user.post', compact('recommendPost', 'newestPosts', 'recentlyPosts', 'mostPopularPosts', 'topics'));
    }

    public function loadPostScrollPaginate(Request $request)
    {
        $recentlyPosts = $this->post->getNewestPostsPaginate(config('define.post.paginate'), $request->skip);

        if ($request->ajax()) {

            return view('user.sections.post_paginate_scroll', compact('recentlyPosts'))->render();
        }
    }

    public function detailPost(Request $request)
    {
        $mostPopularPosts = $this->post->getMostRatePost([config('define.post.type.item')],
            config('define.post.most_popular'), config('define.post.no_skip'));

        $topics = $this->topic->checkImageCollection($this->topic->getData(['media']),
            config('define.post.topic.path'), config('define.post.topic.default_image'));

        $post = $this->post->findById($request->id);

        if ($post) {

            $post->load(['comments' => function($query) {
                $query->whereNull('comment_id')->orderBy('created_at', 'desc');
            }, 'comments.replies.user.media' => function($query) {
                $query->orderBy('created_at', 'desc');
            }, 'rates', 'user', 'topic', 'medias', ]);
        }

        event(new ViewPost($post));

        return view('user.detail_post', compact('mostPopularPosts', 'topics', 'post'));
    }

    public function comment(Request $request)
    {
        $post = $this->post->findById($request->idPost);

        $comment = $post->comments()->create([
            'content' => $request->contents,
            'user_id' => Auth::id(),
        ]);

        return view('user.sections.single_comment', compact('comment', 'post'));
    }

    public function loadReply($id)
    {
        $replies = $this->comment->findWithCondition('comment_id', $id);

        return view('user.sections.reply_comment_user', compact('replies'));
    }

    public function replyView(Request $request)
    {
        $idComment = $request->idComment;

        $idPost = $request->idPost;

        return view('user.sections.reply_comment_post', compact('idComment', 'idPost'));
    }

    public function reply(Request $request)
    {
        $post = $this->post->findById($request->idPost);

        $reply = $post->comments()->create([
            'content' => $request->contents,
            'user_id' => Auth::id(),
            'comment_id' => $request->idComment,
        ]);

        return $reply;
    }
}
