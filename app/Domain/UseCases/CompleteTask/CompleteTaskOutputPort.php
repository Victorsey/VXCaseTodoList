<?php

namespace App\Domain\UseCases\CompleteTask;

use App\Domain\UseCases\CompleteTask\CompleteTaskResponseModel;
use App\Domain\Interfaces\ViewModel;

interface CompleteTaskOutputPort
{
    public function completedTask(CompleteTaskResponseModel $model): ViewModel;

    public function unableToCompleteTask(CompleteTaskResponseModel $model): ViewModel;
}