<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CommentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment' => 'required|string',
        ]);

        CommentsModel::create([
            'user_id' => Auth::id(),
            'article_id' => $request->get('article_id'),
            'content' => $request->get('comment'),
        ]);

        return redirect()->back();
    }
}
