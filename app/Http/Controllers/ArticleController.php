<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }
    public function index()
    {
        $articles = Article::latest()->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function blog()
    {
        $allArticles = Article::paginate(4);
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

        $this->articleRepository->createArticle($singleArticle, $request, $user);

        return redirect()->route('blog.articles');
    }

    public function editArticle(Article $singleArticle)
    {
        return view('admin/edit-article', compact('singleArticle'));
    }

    public function updateArticle(Article $singleArticle, Request $request)
    {
        $this->articleRepository->updateArticle($singleArticle, $request);
        return redirect()->route('articles.all');
    }
}
