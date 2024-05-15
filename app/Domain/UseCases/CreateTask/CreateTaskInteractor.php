<?php


namespace App\Domain\UseCases\CreateTask;

use App\Domain\UseCases\CreateTask\CreateTaskInputPort;
use App\Domain\UseCases\CreateTask\CreateTaskOutputPort;
use App\Domain\Interfaces\TaskRepository;
use App\Domain\Interfaces\TaskFactory;
use App\Domain\UseCases\CreateTask\CreateTaskRequestModel;
use App\Domain\Interfaces\ViewModel;

class CreateTaskInteractor implements CreateTaskInputPort
{
    public function __construct(
        private CreateTaskOutputPort $output,
        private TaskRepository $repository,
        private TaskFactory $factory,
    ){
    }

    public function createTask(CreateTaskRequestModel $request): ViewModel{
        $task = $this->factory->make([
            'task' => $request->getTask(),
            'completed' => false,
        ]);
        $tasks = $this->repository->getAllTasks();

        try{
            $task = $this->repository->create($task);
        }
        catch(\Exception $e){
            return $this->output->unableToCreateTask(
                new CreateTaskResponseModel($task, $tasks), $e
            );

        }
        $tasks = $this->repository->getAllTasks();

        return $this->output->taskCreated(
            new CreateTaskResponseModel($task, $tasks)
        );

    }





}
