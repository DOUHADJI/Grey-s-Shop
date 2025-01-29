<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontNavigationController extends Controller
{
    public function home()
    {
        return view("pages.welcome");
    }

    public function showCategories()
    {
        $categories = Category::with("articles")->get();

        return view("pages.category.index", [
            "categories" => $categories
        ]);
    }

    public function showCategory(string $slug)
    {
        $category = Category::where("slug", $slug)->first();
        $articles = Article::where("category_id", $category->id)->paginate(2);

        return view("pages.category.show", [
            "category" => $category,
            "articles" => $articles
        ]);
    }

    public function showArticle(string $categorySlug, string $slug)
    {

        $article = Article::where("slug", $slug)->with(["category", "comments"])->first();
        $relatedArticles = Article::where("id", "!=", $article->id)->with(["category", "comments"])->orderBy("updated_at", "DESC")->take(8)->get();

        return view("pages.article.show", [
            "article" => $article,
            "relatedArticles" => $relatedArticles
        ]);
    }
}
