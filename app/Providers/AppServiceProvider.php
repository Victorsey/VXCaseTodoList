<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Adapters\Presenters;
use App\Domain;
use App\Factories;
use App\Http\Controllers as HttpControllers;
use App\Http\Responses as HttpResponses;
use App\Repositories;
use App\Domain\UseCases;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            Domain\Interfaces\TaskFactory::class,
            Factories\TaskModelFactory::class,
        );

        $this->app->bind(
            Domain\Interfaces\TaskRepository::class,
            Repositories\TaskDatabaseRepository::class,
        );

        $this->app
            ->when(HttpControllers\CreateTaskController::class)
            ->needs(UseCases\CreateTask\CreateTaskInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\CreateTask\CreateTaskInteractor::class, [
                    'output' => $app->make(Presenters\CreateTaskHttpPresenter::class),
                ]);
            }
        );

        $this->app
            ->when(HttpControllers\DeleteTaskController::class)
            ->needs(UseCases\DeleteTask\DeleteTaskInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\DeleteTask\DeleteTaskInteractor::class, [
                    'output' => $app->make(Presenters\DeleteTaskHttpPresenter::class),
                ]);
            }
        );
    
        $this->app
            ->when(HttpControllers\CompleteTaskController::class)
            ->needs(UseCases\CompleteTask\CompleteTaskInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\CompleteTask\CompleteTaskInteractor::class, [
                    'output' => $app->make(Presenters\CompleteTaskHttpPresenter::class),
                ]);
            }
        );

        $this->app
            ->when(HttpControllers\IndexController::class)
            ->needs(UseCases\Index\IndexInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\Index\IndexInteractor::class, [
                    'output' => $app->make(Presenters\IndexHttpPresenter::class),
                ]);
            }
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
