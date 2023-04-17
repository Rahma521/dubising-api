<?php

namespace App\Providers;

use App\Repository\BaseInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
       // 'App\Repository\BaseInterface'
    }

   
    public function boot()
    {
        //
    }
}
