<?php


namespace App\Http\Controllers;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\CreateTask\CreateTaskInputPort;
use App\Domain\UseCases\CreateTask\CreateTaskRequestModel;
use App\Http\Requests\CreateTaskRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateTaskController extends Controller
{
    
    public function __construct(
        private CreateTaskInputPort $interactor,
    ){}

    public function __invoke(CreateTaskRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createTask(
            new CreateTaskRequestModel($request->validated())
        );

        return $viewModel->getResponse();

    }
    
}
