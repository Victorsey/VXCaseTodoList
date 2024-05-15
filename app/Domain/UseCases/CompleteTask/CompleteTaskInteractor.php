<?php

namespace App\Domain\UseCases\CompleteTask;

use App\Domain\UseCases\CompleteTask\CompleteTaskInputPort;
use App\Domain\UseCases\CompleteTask\CompleteTaskOutputPort;
use App\Domain\Interfaces\TaskEntity;
use App\Domain\Interfaces\TaskRepository;
use App\Domain\UseCases\CompleteTask\CompleteTaskRequestModel;
use App\Domain\Interfaces\ViewModel;
Use App\Domain\UseCases\CompleteTask\CompleteTaskResponseModel;


class CompleteTaskInteractor implements CompleteTaskInputPort
{
    public function __construct(
        private CompleteTaskOutputPort $output,
        private TaskRepository $repository,
    ){
    }

    public function completeTask(CompleteTaskRequestModel $request): ViewModel
    {
        $tasks = $this->repository->getAllTasks();
        if($this->repository->completeTask($request->getId(),$request->getCompleted()))
        {
            $tasks = $this->repository->getAllTasks();
            return $this->output->completedTask(
                new CompleteTaskResponseModel($tasks)
            );
        }
        else
        {
            return $this->output->unableToCompleteTask(
                new CompleteTaskResponseModel($tasks)
            );
        }


    }
}