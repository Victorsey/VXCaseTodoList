<?php

namespace App\Domain\UseCases\Index;

use App\Domain\UseCases\Index\IndexInputPort;
use App\Domain\UseCases\Index\IndexOutputPort;
use App\Domain\Interfaces\TaskRepository;
use App\Domain\UseCases\Index\IndexRequestModel;
use App\Domain\Interfaces\ViewModel;

class IndexInteractor implements IndexInputPort
{
    public function __construct(
        private IndexOutputPort $output,
        private TaskRepository $repository,
    ){
    }

    public function viewIndex(): ViewModel
    {
        $tasks = $this->repository->getAllTasks();
        return $this->output->viewIndex(
            new IndexResponseModel($tasks)
        );
    }
}