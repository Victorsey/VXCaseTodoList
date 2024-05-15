<?php

namespace App\Domain\UseCases\CreateTask;

use App\Domain\Interfaces\TaskEntity;

class CreateTaskResponseModel
{
    public function __construct(
        private TaskEntity $task,
        private array $tasks,
    ) {
    }

    public function getTask(): TaskEntity
    {
        return $this->task;
    }

    public function getAllTasks(): array
    {
        return $this->tasks;
    }
}