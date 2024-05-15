<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Interfaces\TaskEntity;

class Task extends Model implements TaskEntity
{
    use HasFactory;

    protected $fillable = [
        'task',
        'completed',
    ];

    // User Entities Methodes

    public function getTask(): string
    {
        return $this->attributes['task'];
    }

    public function setTask(string $text): void
    {
        $this->attributes['task']=$text;
    }

    public function getCompleted(): bool
    {
        return $this->attributes['completed'];
    }

    public function setCompleted(bool $isCompleted): void
    {
        $this->attributes['completed']=$isCompleted;
    }


}
