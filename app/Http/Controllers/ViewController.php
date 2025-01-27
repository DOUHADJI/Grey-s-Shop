<?php

namespace App\Http\Controllers;

use App\Http\Requests\ViewCreateRequest;
use App\UseCases\ViewUseCase;
use Livewire\Component;

class ViewController extends Component
{
    protected $viewUseCase;

    public function __construct(ViewUseCase $viewUseCase)
    {
        $this->viewUseCase = $viewUseCase;
    }

    public function store(ViewCreateRequest $request)
    {
        $this->viewUseCase->createView($request->validated());
        session()->flash('success', 'View recorded successfully.');
        return redirect()->back();
    }
}
