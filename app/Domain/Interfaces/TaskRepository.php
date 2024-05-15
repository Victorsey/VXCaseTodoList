<?php

namespace App\Domain\Interfaces;

interface TaskRepository
{
    public function create(TaskEntity $task): TaskEntity;
    public function findById(int $id): TaskEntity;
    public function deleteById(int $id): bool;
    public function getAllTasks(): array;
    public function completeTask(int $id, int $completed): bool;
}