<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BasicRepository;

class UserRepository extends BasicRepository implements UserRepositoryInterface
{
    public function model()
    {
        return new User;
    }
}
