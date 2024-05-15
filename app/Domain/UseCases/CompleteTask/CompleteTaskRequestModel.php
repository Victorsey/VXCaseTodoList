<?php

namespace App\Domain\UseCases\CompleteTask;



class CompleteTaskRequestModel
{
    public function __construct(
        private array $attributes,
    ){
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCompleted(): bool
    {
        return $this->attributes['completed'];
    }
}