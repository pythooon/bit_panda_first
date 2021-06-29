<?php

declare(strict_types=1);

namespace App\Providers;

use App\Commons\CommandBus\CommandBus;
use App\Commons\CommandBus\CommandBusImpl;
use App\Commons\QueryBus\QueryBus;
use App\Commons\QueryBus\QueryBusImpl;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\ParallelTesting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CommandBus::class, CommandBusImpl::class);
        $this->app->bind(QueryBus::class, QueryBusImpl::class);
    }

    public function boot(): void
    {
    }
}
