<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontNavigationController extends Controller
{
    public function home()
    {
        return view("pages.welcome");
    }

    public function about()
    {
        return view("pages.about");
    }

    public function contact()
    {
        return view("pages.contact");
    }

    public function shop()
    {
        return view("pages.article.index");
    }

    public function search(Request $request)
    {
        $term = $request->input("term");
        $category = $request->input("category");

        $searchTerm = "%" . $term . "%";
        $articles = Article::query();
        $posts = Post::query();

        if ($searchTerm) {
            $articles->where("title", "like", $searchTerm);
            $posts->where("title", "like", $searchTerm);
        }

        if ($category && $category !== "all") {
            $categoryModel = Category::where("slug", $category)->first();
            $articles->where("category_id", $categoryModel->id);
            $posts->where("category_id", $categoryModel->id);
        }

        return view("pages.search", [
            "request" => $request,
            "term" => $term,
            "articles" => $articles->paginate(4),
            "posts" => $posts->paginate(4)
        ]);
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
        $otherCategories = Category::where("id", "!=", $category->id)->get();

        return view("pages.category.show", [
            "category" => $category,
            "articles" => $articles,
            "otherCategories" => $otherCategories
        ]);
    }


    public function showBestSelling()
    {
        $articles = Article::take(15)->paginate(10);

        return view("pages.best-selling", [
            "articles" => $articles
        ]);
    }

    public function showFeaturedArticles()
    {
        $articles = Article::where("is_featured", true)->orderBy("created_at", "ASC")->paginate(10);

        return view("pages.featured-articles", [
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
