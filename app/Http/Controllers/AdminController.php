<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/admin-panel');
    }

    public function allArticles()
    {
        $allArticles = Article::all();
        return view('admin/admin-panel', compact('allArticles'));
    }
}
