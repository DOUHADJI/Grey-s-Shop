<?php

namespace App\UseCases;

use App\Repositories\CommentRepository;

class CommentUseCase
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getCommentsByArticleId($articleId)
    {
        return $this->commentRepository->getCommentsByArticleId($articleId);
    }

    public function createComment(array $data)
    {
        return $this->commentRepository->createComment($data);
    }

    public function deleteComment($id)
    {
        return $this->commentRepository->deleteComment($id);
    }
}
