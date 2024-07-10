<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->take(4)->get();

        return view('welcome', compact('articles'));
    }

    public function blog()
    {
        $allArticles = Article::all();

        return view('blog', compact('allArticles'));
    }

    public function allArticles()
    {
        $allArticles = Article::all();

        return view('admin/all-articles', compact('allArticles'));
    }

    public function deleteArticle(Article $singleArticle)
    {
        $singleArticle->delete();
        return redirect()->route('articles.all');
    }

    public function addArticles(Request $request, Article $singleArticle)
    {
        $user = Auth::user();

        if ($user == null) {
            return redirect()->route('login')->with('error', 'Please login to add article');
        }

        $singleArticle->create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        return redirect()->route('blog.articles');
    }

    public function editArticle(Article $singleArticle)
    {
        return view('admin/edit-article', compact('singleArticle'));
    }

    public function updateArticle(Request $request, Article $singleArticle)
    {
        $singleArticle->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        return redirect()->route('articles.all');
    }

}
