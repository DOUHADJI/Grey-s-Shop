<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;


    public function mount()
    {

    }

    public function getArticlesProperty(Request $request)
    {
        $articles = Article::query();

        $categorySlug = $request->input("category");
        $title = $request->input("title");
        $minPrice = $request->input("min-price");
        $maxPrice = $request->input("max-price");

        if ($categorySlug) {
            $articles->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        if ($title) {
            $articles->where('title', 'like', "%$title%");
        }


        if ($minPrice) {
            $articles->where('price', '>=', (float) $minPrice);
        }


        if ($maxPrice) {
            $articles->where('price', '<=', (float) $maxPrice);
        }


        return $articles->paginate(12);
    }


    public function render(Request $request)
    {
        return view('livewire.shop-component', [
            "articles" => $this->getArticlesProperty($request),
            "articleCount" => Article::count()
        ]);
    }
}
