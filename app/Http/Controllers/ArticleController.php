<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->take(4)->get();

        return view('welcome', compact('articles'));
    }

    // ????
    public function articles()
    {
        $blogArticles = Article::all();

        return view('blog', compact('blogArticles'));
    }

    // ????
    public function allArticles()
    {
        $allArticles = Article::all();

        return view('articles', compact('allArticles'));
    }

    public function deleteArticle($article)
    {
        $singleArticle = Article::where(['id' => $article])->first();

        if ($singleArticle == null) {
            die("Article not found");
        }

        $singleArticle->delete();

        return redirect()->route('articles');
    }

    public function addArticle(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'content' => 'required',
           'author' => 'required',
        ]);

        Article::create([
           'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author' => $request->get('author'),
        ]);

        return redirect()->route('articles');
    }

    public function editArticle($article)
    {
        $singleArticle = Article::where(['id' => $article])->first();

        if ($singleArticle == null) {
            die('Article not found');
        }

        return view('edit-article', compact('singleArticle'));
    }

    public function updateArticle(Request $request, $article)
    {
        $request->validate([
           'title' => 'required',
           'content' => 'required',
           'author' => 'required',
        ]);

        $articleToUpdate = Article::findOrFail($article);
        $articleToUpdate->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author' => $request->get('author'),
        ]);

        return redirect('/admin/all-articles');
    }

}
