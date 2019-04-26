<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Repositories\Post\PostRepository;
use App\Repositories\Topic\TopicRepository;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $langActive = [
        'vn',
        'en',
    ];

    protected $post;

    public function __construct(Post $post)
    {
        // $this->middleware(['auth', 'verified']);
        $this->post = new PostRepository($post);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $default = config('define.type_schedule.default');

        $custom = config('define.type_schedule.custom');

        $combo = config('define.type_schedule.combo');

        $posts = $this->post->getNewestPostsPaginate(config('define.post.take_five_post'), config('define.post.no_skip'));

        return view('index', compact('default', 'custom', 'combo', 'posts'));
    }

    public function changeLang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);

            return redirect()->back();
        }
    }
}
