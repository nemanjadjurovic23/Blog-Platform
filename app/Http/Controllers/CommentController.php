<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\CommentsModel;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }
    public function store(CommentsModel $comment, CommentRequest $request)
    {
        $this->commentRepository->createComment($comment, $request);

        return redirect()->back();
    }

    public function show($articleId)
    {
        $comments = CommentsModel::where('article_id', $articleId)->get();
        return view('comments', compact('comments'));
    }
}
