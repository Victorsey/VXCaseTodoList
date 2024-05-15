<?php

namespace App\Domain\UseCases\CreateTask;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\CreateTask\CreateTaskRequestModel;

interface CreateTaskInputPort{
    public function createTask(CreateTaskRequestModel $model): ViewModel;
}