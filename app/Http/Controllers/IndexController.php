<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\UseCases\Index\IndexInputPort;

class IndexController extends Controller
{
    public function __construct(
        private IndexInputPort $interactor,
    ){
    }

    public function __invoke()
    {
        $viewModel = $this->interactor->viewIndex();
        return $viewModel->getResponse();
    }
}
