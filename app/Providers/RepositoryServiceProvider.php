<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\Base\BaseRepository;
use App\Repository\Base\BaseRepositoryImpl;
use App\Repository\Country\CountryRepository;
use App\Repository\Country\CountryRepositoryImpl;
use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryImpl;
use App\Repository\UserDetail\UserDetailRepository;
use App\Repository\UserDetail\UserDetailRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BaseRepository::class, BaseRepositoryImpl::class);
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(CountryRepository::class, CountryRepositoryImpl::class);
        $this->app->bind(UserDetailRepository::class, UserDetailRepositoryImpl::class);
    }

    public function boot(): void
    {
        //
    }
}
