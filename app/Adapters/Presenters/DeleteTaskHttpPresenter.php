<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\DeleteTask\DeleteTaskOutputPort;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\DeleteTask\DeleteTaskResponseModel;


class DeleteTaskHttpPresenter implements DeleteTaskOutputPort
{
    public function taskDeleted(DeleteTaskResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('redirect')
                ->route('task.index')
        );
    }

    public function unableToDeleteTask(DeleteTaskResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('view')
                ->make('task.show')
                ->with(['message' => 'Não foi possivel deletar essa task :('])
                ->with(['tasks' => $model->getAllTasks()])
        );
    }
}