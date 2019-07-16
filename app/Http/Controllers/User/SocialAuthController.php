<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    protected $user;
    protected $media;

    public function __construct(UserRepositoryInterface $user, MediaRepositoryInterface $media)
    {
        $this->user = $user;
        $this->media = $media;
    }

    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $service = new SocialAccountService();

        $user = $service->createOrGetUser($this->user, $this->media, Socialite::driver($social)->stateless()->user(), $social);

        auth()->login($user);

        return redirect()->route('home');
    }
}
