<?php

namespace App\Domain\UseCases\Index;

use App\Domain\UseCases\Index\IndexResponseModel;
use App\Domain\Interfaces\ViewModel;

interface IndexOutputPort
{
    public function viewIndex(IndexResponseModel $model): ViewModel;


}