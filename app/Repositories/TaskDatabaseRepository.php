<?php

namespace App\Repositories;

use App\Domain\Interfaces\TaskRepository;
use App\Domain\Interfaces\TaskEntity;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskDatabaseRepository implements TaskRepository
{
    public function create(TaskEntity $task): TaskEntity
    {
        return Task::create([
            'task' => $task->getTask(),
            'completed' => $task->getCompleted(),
        ]);
    }

    public function findById(int $id): TaskEntity
    {
        return Task::where('id', $id)->first();
    }

    public function deleteById(int $id): bool
    {
        return Task::destroy($id);
    }

    public function getAllTasks(): array
    {
        return DB::table('tasks')->orderBy('completed', 'asc')
                                ->orderBy('updated_at', 'desc')
                                ->get()
                                ->toArray();
    }

    public function completeTask(int $id, int $completed): bool
    {
        return Task::where('id', $id)->first()->update(['completed' => $completed]);
    }
}