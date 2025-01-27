<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\UseCases\ArticleUseCase;
use Livewire\Component;

class ArticleController extends Component
{
    protected $articleUseCase;

    public function __construct(ArticleUseCase $articleUseCase)
    {
        $this->articleUseCase = $articleUseCase;
    }

    public function render()
    {
        $articles = $this->articleUseCase->getAllArticles();
        return view('livewire.articles.index', compact('articles'));
    }

    public function store(ArticleCreateRequest $request)
    {
        $this->articleUseCase->createArticle($request->validated());
        session()->flash('success', 'Article created successfully.');
        return redirect()->route('articles.index');
    }

    public function update(ArticleUpdateRequest $request, $id)
    {
        $this->articleUseCase->updateArticle($id, $request->validated());
        session()->flash('success', 'Article updated successfully.');
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $this->articleUseCase->deleteArticle($id);
        session()->flash('success', 'Article deleted successfully.');
        return redirect()->route('articles.index');
    }
}

