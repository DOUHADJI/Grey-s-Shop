<?php

use App\Http\Controllers\FrontNavigationController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// FRont Pages routes
Route::get("/", [FrontNavigationController::class, "home"])->name("home");
Route::get("/a-propos-de-nous", [FrontNavigationController::class, "about"])->name("about");
Route::get("/faq", [FrontNavigationController::class, "faq"])->name("faq");
Route::get("/nous-contacter", [FrontNavigationController::class, "contact"])->name("contact");
Route::get("/notre-boutique", [FrontNavigationController::class, "shop"])->name("shop");
Route::get("meilleurs-articles-vendus", [FrontNavigationController::class, "showBestSelling"])->name("best-selling");
Route::get("articles-en-vedette", [FrontNavigationController::class, "showFeaturedArticles"])->name("featured-articles");

Route::get("/blog", [PostController::class, "index"])->name("blog.index");
Route::get("/blog/posts/{slug}", [PostController::class, "show"])->name("post.show");

Route::get("/rechercher-un-element", [FrontNavigationController::class, "search"])->name("search");

Route::get("/categories-de-produits", [FrontNavigationController::class, "showCategories"])->name("category.index");
Route::get("/categories-de-produits/{slug}", [FrontNavigationController::class, "showCategory"])->name("category.show");
Route::get("/categories-de-produits/{categorySlug}/{slug}", [FrontNavigationController::class, "showArticle"])->name("article.show");



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



/* Route::prefix('admin')->middleware(['auth', 'admin.role'])->name('admin.')->group(function () {

    // Routes pour les utilisateurs (Users)
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'render'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Routes pour les catégories (Categories)
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'render'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Routes pour les articles (Articles)
    Route::prefix('articles')->name('articles.')->group(function () {
        Route::get('/', [ArticleController::class, 'render'])->name('index');
        Route::post('/store', [ArticleController::class, 'store'])->name('store');
        Route::put('/update/{id}', [ArticleController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ArticleController::class, 'destroy'])->name('destroy');
    });

    // Routes pour les commentaires (Comments)
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [CommentController::class, 'render'])->name('index');
        Route::post('/store', [CommentController::class, 'store'])->name('store');
        Route::put('/update/{id}', [CommentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });
}); */



require __DIR__ . '/auth.php';
