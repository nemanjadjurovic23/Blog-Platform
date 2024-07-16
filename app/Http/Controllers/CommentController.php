<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\CommentsModel;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, CommentsModel $comment)
    {
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
