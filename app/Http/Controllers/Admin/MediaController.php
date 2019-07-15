<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Media\MediaRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $media;

    public function __construct(MediaRepositoryInterface $media)
    {
        $this->media = $media;
    }
}
