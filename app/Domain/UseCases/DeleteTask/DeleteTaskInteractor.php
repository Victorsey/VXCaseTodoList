<?php

namespace App\Domain\UseCases\DeleteTask;

use App\Domain\UseCases\DeleteTask\DeleteTaskInputPort;
use App\Domain\UseCases\DeleteTask\DeleteTaskOutputPort;
use App\Domain\Interfaces\ViewModel;
use App\Domain\Interfaces\TaskRepository;

class DeleteTaskInteractor implements DeleteTaskInputPort
{
    public function __construct(
        public deleteTaskOutputPort $output,
        public TaskRepository $repository,
    ){
    }

    public function deleteTask(DeleteTaskRequestModel $model): ViewModel
    {

        if($this->repository->deleteById($model->getId()))
        {
            return $this->output->taskDeleted(
                new DeleteTaskResponseModel($this->repository->getAllTasks())
            );
        }
        else
        {
            return $this->output->unableToDeleteTask(
                new DeleteTaskResponseModel($this->repository->getAllTasks())
            );
        }

    }
}