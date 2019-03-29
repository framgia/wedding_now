<?php

namespace App\Http\Controllers\Admin;

use Auth;

use App\Models\Tag;
use App\Models\Post;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;

use App\Repositories\Post\PostRepository;
use App\Repositories\Tag\TagRepository;

class PostController extends Controller
{
    protected $postModel, $tagModel;

    public function __construct(Post $post, Tag $tag)
    {
        $this->postModel = new PostRepository($post);
        $this->tagModel = new TagRepository($tag);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = $this->getTagPluck();

        return view('admin.post.index', compact('tag'));
    }

    public function getAll()
    {
        // with, withcount
        return $this->postModel->getAll(['tags', 'user'], ['comments'])->toJson();
    }

    public function getTagPluck()
    {
        return Tag::pluck('name', 'id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = $this->getTagPluck();

        return view('admin.post.create', compact('tag'));
    }

    public function sendFile(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $this->postModel->saveFile(null, $request->file, config('asset.storage.post'));

            return response()->json(config('asset.storage.post') . $file, 200);
        }

        return response()->json(['message' => __('base.fail')], 422);
    }

    public function deleteFile($file)
    {
        $path = config('asset.storage.post') . $file;
        if (file_exists($path)) {
            unlink($path);
            return response()->json(['message' => __('base.success')], 204);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $tag = [];

        try {
            DB::beginTransaction();
                $data = $this->postModel->create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'user_id' => Auth::id(),
                    'slug' => $this->postModel->slug($request->title)
                ]);

                if (!$request->tag) {
                    DB::rollBack();

                    return response()->json([
                        'message' => __('base.select') . ' ' . __('base.tag')
                    ], 422);
                }

                foreach ($request->tag as $value) {
                    $check = $this->checkTagExists('name', $value);

                    if (!$check) {
                        $newTag = $this->tagModel->create(['name' => $value]);
                        $tagId = $newTag->id;
                    } else {
                        $tagId = $check->id;
                    }
                    $tag[] = [
                        'post_id' => $data->id,
                        'tag_id' => $tagId
                    ];
                }

                $data->tags()->attach($tag);
                // $data->topic()->attach($request->topic);
            DB::commit();

            return __('base.success');
        } catch (Exception $e) {
            return __('base.fail');
        }
    }

    public function checkTagExists($column, $value)
    {
        return Tag::where($column, $value)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->postModel->findById($id)->load('tags', 'user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, $id)
    {
        // dd($request->all());
        $tag = [];

        try {
            DB::beginTransaction();
                $data = $this->postModel->findById($id);
                $data = $this->postModel->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'user_id' => Auth::id(),
                    'slug' => $this->postModel->slug($request->title)
                ]);

                if (!$request->tag) {
                    DB::rollBack();

                    return response()->json([
                        'message' => __('base.select') . ' ' . __('base.tag')
                    ], 422);
                }

                $data->tags()->detach();

                foreach ($request->tag as $value) {
                    $check = $this->checkTagExists('name', $value);

                    if (!$check) {
                        $newTag = $this->tagModel->create(['name' => $value]);
                        $tagId = $newTag->id;
                    } else {
                        $tagId = $check->id;
                    }


                    $tag[] = [
                        'post_id' => $data->id,
                        'tag_id' => $tagId
                    ];
                }

                $data->tags()->attach($tag);
                // $data->topic()->attach($request->topic);
            DB::commit();

            return __('base.success');
        } catch (Exception $e) {
            return __('base.fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
