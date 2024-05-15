<?php

namespace App\Domain\Interfaces;

interface TaskFactory
{
    public function make(array $attributes = []): TaskEntity;
}