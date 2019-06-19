<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\Topic\TopicRepositoryInterface;
use Http\Client\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;

class PostController extends Controller
{
    protected $post;
    protected $tag;
    protected $topic;

    public function __construct(
        PostRepositoryInterface $post,
        TagRepositoryInterface $tag,
        TopicRepositoryInterface $topic
    )
    {
        $this->post = $post;
        $this->tag = $tag;
        $this->topic = $topic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.list_post');
    }

    public function getAll()
    {
        return $this->post->getData(['tags', 'user'], [], ['*'], ['comments'])->toJson();
    }

    public function create()
    {
        $tags = $this->tag->getData()->pluck('name', 'id');

        $topics = collect($this->topic->getData())->pluck('name', 'id');

        return view('admin.create_post', compact('tags', 'topics'));
    }

    public function store(PostRequest $request)
    {
        DB::transaction(function () use ($request) {

            $post = $this->post->create([
                'title' => $request->title,
                'content' => $request->contents,
                'user_id' => Auth::id(),
                'topic_id' => $request->topic,
                'brief' => $request->title,
                'slug' => str_slug($request->title),
                'status' => config('define.post.status.draft'),
                'type' => config('define.post.type.thinks'),
            ]);

            $tags = [];

            foreach ($request->tags as $tag) {

                $newTag = $this->tag->updateOrCreate([
                    'name' => $tag,
                ], [
                    'name' => $tag,
                ]);

                array_push($tags, $newTag->id);
            }

            $post->tags()->attach($tags);
        });
    }

    public function show($id)
    {
        $post = $this->post->findById($id)->load('tags', 'user', 'topic');

        return view('admin.show_post', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->post->findById($id);

        if ($post) {
            $post->load('tags', 'user');
        }

        $tags = $this->tag->getData()->pluck('name', 'id');

        $topics = collect($this->topic->getData())->pluck('name', 'id');

        return view('admin.edit_post', compact('tags', 'topics', 'post'));
    }

    public function update(PostRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $this->post->update($id, [
                'title' => $request->title,
                'content' => $request->contents,
                'user_id' => Auth::id(),
                'topic_id' => $request->topic,
                'brief' => $request->title,
                'slug' => str_slug($request->title),
                'status' => config('define.post.status.draft'),
                'type' => config('define.post.type.thinks'),
            ]);

            $post = $this->post->findById($id);

            $tags = [];

            foreach ($request->tags as $tag) {

                $newTag = $this->tag->updateOrCreate([
                    'name' => $tag,
                ], [
                    'name' => $tag,
                ]);

                array_push($tags, $newTag->id);
            }

            $post->tags()->sync($tags);
        });
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $post = $this->post->findById($id);

            $post->tags()->detach();

            $post->comments()->delete();

            $post->rates()->delete();

            $post->medias()->delete();

            $this->post->destroy($id);
        });
    }
}
