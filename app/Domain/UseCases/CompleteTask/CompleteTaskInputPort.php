<?php

namespace App\Domain\UseCases\CompleteTask;

use App\Domain\UseCases\CompleteTask\CompleteTaskRequestModel;
use App\Domain\Interfaces\ViewModel;

interface CompleteTaskInputPort
{
    public function completeTask(CompleteTaskRequestModel $model): ViewModel;
}