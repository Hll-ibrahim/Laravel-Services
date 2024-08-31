<?php

namespace App\Providers;

use App\Repositories\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;
use App\Services\TaskService;


class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);

        $this->app->bind(TaskService::class, function ($app) {
            return new TaskService(
                $app->make(TaskRepositoryInterface::class)
            );
        });
        $this->app->singleton(CategoryService::class, function ($app) {
            return new CategoryService();
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
