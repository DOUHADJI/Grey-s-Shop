<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function getCommentsByArticleId($articleId)
    {
        return Comment::where('article_id', $articleId)->with('user')->get();
    }

    public function createComment(array $data)
    {
        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->article_id = $data['article_id'];
        $comment->user_id = $data['user_id'];
        $comment->save();
        return $comment;
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        return $comment->delete();
    }
}
