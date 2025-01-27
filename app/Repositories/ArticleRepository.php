<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function getAllArticles()
    {
        return Article::with('category', 'comments', 'views')->get();
    }

    public function getArticleById($id)
    {
        return Article::with('category', 'comments', 'views')->findOrFail($id);
    }

    public function createArticle(array $data)
    {
        $article = new Article();
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->image = $data['image'];
        $article->view_count = $data['view_count'] ?? 0;
        $article->category_id = $data['category_id'];
        $article->save();
        return $article;
    }

    public function updateArticle($id, array $data)
    {
        $article = $this->getArticleById($id);
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->image = $data['image'];
        $article->category_id = $data['category_id'];
        $article->save();
        return $article;
    }

    public function deleteArticle($id)
    {
        $article = $this->getArticleById($id);
        return $article->delete();
    }

    public function incrementViewCount($id)
    {
        $article = $this->getArticleById($id);
        $article->view_count++;
        $article->save();
        return $article;
    }
}
