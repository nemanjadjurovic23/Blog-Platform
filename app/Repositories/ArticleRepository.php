<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleRepository {

    private $articleModel;

    public function __construct()
    {
        $this->articleModel = new Article();
    }

    public function createArticle(Article $singleArticle, $request, $user)
    {

        $singleArticle->create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
    }

    public function updateArticle(Article $singleArticle, $request)
    {
        $singleArticle->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
    }
}
