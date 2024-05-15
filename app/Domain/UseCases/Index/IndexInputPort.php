<?php

namespace App\Domain\UseCases\Index;

use App\Domain\Interfaces\ViewModel;

interface IndexInputPort
{
    public function viewIndex(): ViewModel;
}