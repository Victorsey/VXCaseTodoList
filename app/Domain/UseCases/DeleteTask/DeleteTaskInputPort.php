<?php

namespace App\Domain\UseCases\DeleteTask;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\DeleteTask\DeleteTaskRequestModel;


interface DeleteTaskInputPort
{
    public function deleteTask(DeleteTaskRequestModel $model): viewModel;
}