<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\UseCases\CompleteTask\CompleteTaskInputPort;
use App\Http\Requests\CompleteTaskRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use App\Domain\UseCases\CompleteTask\CompleteTaskRequestModel;

class CompleteTaskController extends Controller
{
    public function __construct(
        private CompleteTaskInputPort $interactor,
    ){
    }

    public function __invoke(CompleteTaskRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->completeTask(
            new CompleteTaskRequestModel($request->validated())
        );

        return $viewModel->getResponse();
    }
}
