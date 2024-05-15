<?php

namespace App\Factories;

use App\Domain\Interfaces\TaskEntity;
use App\Domain\Interfaces\TaskFactory;
use App\Models\Task;

class TaskModelFactory implements TaskFactory
{
    public function make(array $attributes = []): TaskEntity
    {
        
        return new Task($attributes);
    }
}