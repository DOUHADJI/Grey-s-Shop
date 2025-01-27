<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function createCategory(array $data)
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'] ?? null;
        $category->save();
        return $category;
    }

    public function updateCategory($id, array $data)
    {
        $category = $this->getCategoryById($id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'] ?? null;
        $category->save();
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->getCategoryById($id);
        return $category->delete();
    }
}
