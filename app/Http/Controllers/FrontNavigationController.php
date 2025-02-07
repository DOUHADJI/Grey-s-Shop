<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use App\UseCases\ArticleUseCase;
use App\UseCases\ViewUseCase;
use Illuminate\Http\Request;

class FrontNavigationController extends Controller
{
    public $articleUseCase;
    public $viewUseCase;

    public function __construct(
        ArticleUseCase $articleUseCase,
        ViewUseCase $viewUseCase
    ) {
        $this->articleUseCase = $articleUseCase;
        $this->viewUseCase = $viewUseCase;
    }

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

    public function faq()
    {
        return view("pages.faq");
    }

    public function shop(Request $request)
    {
       // dd($request);
      //  $articles = Article::paginate(12)->appends($request->query());

        return view("pages.article.index", [
       //     "articles" => $articles
        ]);
    }

    public function search(Request $request)
    {
        $term = $request->input("title");
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

        $this->articleUseCase->incrementViewCount($article->id);

        $viewData = [
            "article_id" => $article->id,
            "ip_address" => request()->ip()
        ];

        $this->viewUseCase->createView($viewData);

        return view("pages.article.show", [
            "article" => $article,
            "relatedArticles" => $relatedArticles
        ]);
    }
}
