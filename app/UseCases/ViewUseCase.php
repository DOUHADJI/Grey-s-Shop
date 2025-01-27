<?php

namespace App\UseCases;

use App\Repositories\ViewRepository;

class ViewUseCase
{
    protected $viewRepository;

    public function __construct(ViewRepository $viewRepository)
    {
        $this->viewRepository = $viewRepository;
    }

    public function getViewsByArticleId($articleId)
    {
        return $this->viewRepository->getViewsByArticleId($articleId);
    }

    public function createView(array $data)
    {
        return $this->viewRepository->createView($data);
    }
}
