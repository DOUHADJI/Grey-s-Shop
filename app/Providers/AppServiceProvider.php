<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Post;
use App\Models\Config;
use App\Models\Category;
use Filament\Forms\Components\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        view()->share('categories', Category::all());
        view()->share("configs", Config::first());
        view()->share("recentPosts", Post::orderBy("created_at", "DESC")->take(3)->get() );
        view()->share("bestSellings", Article::orderBy("created_at", "DESC")->take(12)->get() );
        view()->share("featuredProducts", Article::where("is_featured", 1 )->orderBy("created_at", "ASC")->take(8)->get() );
        view()->share("articlesCount", Article::all()->count());
        view()->share("justArrivedArticles", Article::orderBy("Created_at", "DESC")->take(8)->get() );
    }
}
