<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CommentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, CommentsModel $comment)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment' => 'required|string',
        ]);

        $comment::create([
            'user_id' => Auth::id(),
            'article_id' => $request->get('article_id'),
            'content' => $request->get('comment'),
        ]);

        return redirect()->back();
    }

    public function show($articleId)
    {
        $comments = CommentsModel::where('article_id', $articleId)->get();
        return view('comments', compact('comments'));
    }
}
