<?php

namespace App\Domain\UseCases\CreateTask;

use App\Domain\Interfaces\OutputPort;
use App\Domain\Interfaces\TaskEntity;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\CreateTask\CreateTaskResponseModel;

interface CreateTaskOutputPort
{
    public function taskCreated(CreateTaskResponseModel $model): ViewModel;

    public function taskAlreadyExists(CreateTaskResponseModel $model): ViewModel;

    public function unableToCreateTask(CreateTaskResponseModel $model, \Throwable $e): ViewModel;
}