<?php

namespace App\Domain\UseCases\Index;



class IndexResponseModel
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