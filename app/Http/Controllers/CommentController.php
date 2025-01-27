<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\UseCases\CommentUseCase;
use Livewire\Component;

class CommentController extends Component
{
    protected $commentUseCase;

    public function __construct(CommentUseCase $commentUseCase)
    {
        $this->commentUseCase = $commentUseCase;
    }

    public function render()
    {
        $comments = $this->commentUseCase->getAllComments();
        return view('livewire.comments.index', compact('comments'));
    }

    public function store(CommentCreateRequest $request)
    {
        $this->commentUseCase->createComment($request->validated());
        session()->flash('success', 'Comment added successfully.');
        return redirect()->route('comments.index');
    }

    public function update(CommentUpdateRequest $request, $id)
    {
        $this->commentUseCase->updateComment($id, $request->validated());
        session()->flash('success', 'Comment updated successfully.');
        return redirect()->route('comments.index');
    }

    public function destroy($id)
    {
        $this->commentUseCase->deleteComment($id);
        session()->flash('success', 'Comment deleted successfully.');
        return redirect()->route('comments.index');
    }
}
