<?php

namespace App\Domain\UseCases\DeleteTask;

use App\Domain\Interfaces\TaskEntity;
use App\Domain\Interfaces\ViewModel;

class DeleteTaskResponseModel
{
    public function __construct(
        private array $tasks,
    ){
    }

    public function getAllTasks(): array
    {
        return $this->tasks;
    }
}