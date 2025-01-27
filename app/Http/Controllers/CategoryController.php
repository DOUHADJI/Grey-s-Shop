<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\UseCases\CategoryUseCase;
use Livewire\Component;

class CategoryController extends Component
{
    protected $categoryUseCase;

    public function __construct(CategoryUseCase $categoryUseCase)
    {
        $this->categoryUseCase = $categoryUseCase;
    }

    public function render()
    {
        $categories = $this->categoryUseCase->getAllCategories();
        return view('livewire.categories.index', compact('categories'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $this->categoryUseCase->createCategory($request->validated());
        session()->flash('success', 'Category created successfully.');
        return redirect()->route('categories.index');
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->categoryUseCase->updateCategory($id, $request->validated());
        session()->flash('success', 'Category updated successfully.');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->categoryUseCase->deleteCategory($id);
        session()->flash('success', 'Category deleted successfully.');
        return redirect()->route('categories.index');
    }
}

