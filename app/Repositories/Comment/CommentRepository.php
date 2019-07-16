<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\Base\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }
}
