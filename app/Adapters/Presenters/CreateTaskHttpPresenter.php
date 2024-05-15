<?php

namespace App\Adapters\Presenters;

use App\Domain\UseCases\CreateTask\CreateTaskOutputPort;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\CreateTask\CreateTaskResponseModel;
use App\Adapters\ViewModels\HttpResponseViewModel;

class CreateTaskHttpPresenter implements CreateTaskOutputPort
{
    public function taskCreated(CreateTaskResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('view')
                ->make('task.show')
                ->with(['message' => "Task \"{$model->getTask()->task}\" criada com sucesso!",
                    'tasks' => $model->getAllTasks()])
        );
    }

    public function taskAlreadyExists(CreateTaskResponseModel $model): ViewModel
    {
        // Não entra nunca aqui
        /* return new HttpResponseViewModel(
            app('redirect')
                ->route('task.create')
                ->withErrors(['create-task' => "Task alreay exists."])
        ); */
        return new HttpResponseViewModel(
            app('redirect')
                ->route('task.show')
        );
    }

    public function unableToCreateTask(CreateTaskResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseViewModel(
            app('redirect')
                ->route('task.create')
                ->withErrors(['create-task' => "Error occured while creating user {$model->getTask()->getTask()}"])
        );
    } 
}
