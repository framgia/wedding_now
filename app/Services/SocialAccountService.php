<?php

namespace App\Services;

use App\Models\SocialAccount;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Laravel\Socialite\Two\User as UserSocial;
use TaylorNetwork\UsernameGenerator\Generator;

class SocialAccountService
{
    public function createOrGetUser($userrepo, $mediaRepo, UserSocial $userSocial, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($userSocial->getId())
            ->first();

        if ($account) {
            return $account->user;
        }

        $account = new SocialAccount([
            'provider_user_id' => $userSocial->getId(),
            'provider' => $social,
        ]);

        $user = User::whereEmail($userSocial->email)->first();

        if (!$user) {

            $generate = new Generator();

            $user = DB::transaction(function () use ($userSocial, $userrepo, $mediaRepo, $generate) {

                $user = $userrepo->create([
                    'email' => $userSocial->email,
                    'name' => $userSocial->name,
                    'password' => bcrypt(rand(1, 10000)),
                    'user_name' => $generate->generate($userSocial->name)
                ]);

                $user->roles()->attach(config('define.role.client'));

                $avatarName = $user->user_name . -$user->id . '.jpg';

                file_put_contents(config('asset.users.avatar') . '/' . $avatarName, file_get_contents($userSocial->avatar));

                $mediaRepo->saveAvatarOfUser($user, [
                    'name' => $avatarName,
                ]);

                return $user;
            });
        }

        $account->user()->associate($user);

        $account->save();

        return $user;
    }
}
