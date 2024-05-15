<?php

namespace App\Domain\UseCases\DeleteTask;

use App\Domain\Interfaces\TaskEntity;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\DeleteTask\DeleteTaskResponseModel;

interface DeleteTaskOutputPort
{
    public function taskDeleted(DeleteTaskResponseModel $model): ViewModel;

    public function unableToDeleteTask(DeleteTaskResponseModel $model): ViewModel;
}