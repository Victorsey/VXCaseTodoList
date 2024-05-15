<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\DeleteTask\DeleteTaskInputPort;
use App\Domain\UseCases\DeleteTask\DeleteTaskRequestModel;
use App\Http\Requests\DeleteTaskRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteTaskController extends Controller
{
    public function __construct(
        public DeleteTaskInputPort $interactor,
    ){
    }

    public function __invoke(DeleteTaskRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteTask(
            new DeleteTaskRequestModel($request->validated())
        );

        return $viewModel->getResponse();
    }
    
}