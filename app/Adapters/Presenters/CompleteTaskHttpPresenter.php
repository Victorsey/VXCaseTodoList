<?php

namespace App\Adapters\Presenters;

use App\Domain\UseCases\CompleteTask\CompleteTaskOutputPort;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\CompleteTask\CompleteTaskResponseModel;
use App\Adapters\ViewModels\HttpResponseViewModel;


class CompleteTaskHttpPresenter implements CompleteTaskOutputPort
{
    public function completedTask(CompleteTaskResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('view')->make('task.show')
                        ->with(['tasks' => $model->getAllTasks(),
                                'message' => ''])
        );
    }

    public function unableToCompleteTask(CompleteTaskResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('redirect')
            ->route('task.index')
            ->with(['message' => "Erro: A task não foi atualizada",
                    'tasks' => $model->getAllTasks()])
        );
    }
}