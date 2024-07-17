<?php

namespace App\Repositories;

use App\Models\CommentsModel;
use Illuminate\Support\Facades\Auth;

class CommentRepository {

    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentsModel();
    }

    public function createComment(CommentsModel $comment, $request)
    {
        $comment::create([
            'user_id' => Auth::id(),
            'article_id' => $request->get('article_id'),
            'content' => $request->get('comment'),
        ]);
    }
}
