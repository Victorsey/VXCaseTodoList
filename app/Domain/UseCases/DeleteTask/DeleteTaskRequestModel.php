<?php

namespace App\Domain\UseCases\DeleteTask;

class DeleteTaskRequestModel
{
    public function __construct(
        private array $attributes,
    ){
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

}