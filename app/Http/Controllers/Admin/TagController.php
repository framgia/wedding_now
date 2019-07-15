<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Tag\TagRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tag;

    public function __construct(TagRepositoryInterface $tag)
    {
        $this->tag = $tag;
    }

    public function getAllTag(Request $request)
    {
        $input = $request->search;

        if (empty($input)) {

            return response()->json([]);
        }

        $tags = $this->tag->findWithCondition('name', $input . '%', 'like');

        $formattedTags = [];

        foreach ($tags as $tag) {
            $formattedTags[] = [
                'id' => $tag->id,
                'text' => $tag->name,
            ];
        }

        return response()->json($formattedTags);
    }
}
