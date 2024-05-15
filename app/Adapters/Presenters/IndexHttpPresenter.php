<?php

namespace App\Adapters\Presenters;

use App\Domain\UseCases\Index\IndexOutputPort;
use App\Domain\UseCases\Index\IndexResponseModel;
use App\Domain\Interfaces\ViewModel;
use App\Adapters\ViewModels\HttpResponseViewModel;


class IndexHttpPresenter implements IndexOutputPort
{
    public function viewIndex(IndexResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('view')
            ->make('task.show')
            ->with(['message' => '',
                    'tasks' => $model->getAllTasks()])
        );
    }
}