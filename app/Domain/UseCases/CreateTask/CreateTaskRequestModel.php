<?php

namespace App\Domain\UseCases\CreateTask;


class CreateTaskRequestModel{

    public function __construct(
        private array $attributes,
    ){
    }

    public function getTask(): string
    {
        return $this->attributes['task'];
    }


    
}