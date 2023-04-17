<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\UserInterface;

class UserRepository extends BaseRepository implements UserInterface
{

    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
}