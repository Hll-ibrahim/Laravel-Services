<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PriorityRepositoryInterface;
use App\Repositories\Interfaces\StatusRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\PriorityRepository;
use App\Repositories\StatusRepository;
use App\Repositories\TaskRepository;
use App\Services\CategoryService;
use App\Services\PriorityService;
use App\Services\StatusService;
use App\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(PriorityRepositoryInterface::class, PriorityRepository::class);

        // service ile repository bağlama işlemi
        // Küçük projeler için gereksiz olabilir
        $this->app->singleton(TaskService::class, function ($app) {
            return new TaskService(
                $app->make(TaskRepositoryInterface::class)
            );
        });
        $this->app->singleton(CategoryService::class, function ($app) {
            return new CategoryService(
                $app->make(CategoryRepositoryInterface::class)
            );
        });
        $this->app->singleton(StatusService::class, function ($app) {
            return new StatusService(
                $app->make(StatusRepositoryInterface::class)
            );
        });
        $this->app->singleton(PriorityService::class, function ($app) {
            return new PriorityService(
                $app->make(PriorityRepositoryInterface::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
