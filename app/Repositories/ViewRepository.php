<?php

namespace App\Repositories;

use App\Models\View;

class ViewRepository
{
    public function getViewsByArticleId($articleId)
    {
        return View::where('article_id', $articleId)->get();
    }

    public function createView(array $data)
    {
        $view = new View();
        $view->article_id = $data['article_id'];
        $view->ip_address = $data['ip_address'];
        $view->save();
        return $view;
    }
}
