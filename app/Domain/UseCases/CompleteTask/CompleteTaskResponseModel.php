<?php

namespace App\Domain\UseCases\CompleteTask;



class CompleteTaskResponseModel
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