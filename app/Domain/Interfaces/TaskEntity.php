<?php

namespace App\Domain\Interfaces;

interface TaskEntity
{
    public function getTask(): string;
    public function setTask(string $text): void;
    public function getCompleted(): bool;
    public function setCompleted(bool $isCompleted): void;
}