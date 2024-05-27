<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('blog.index');
Route::view('/about','about')->name('blog.about');
Route::get('/blog', [ArticleController::class, 'articles'])->name('blog.articles');
Route::get('/articles', [ArticleController::class, 'show'])->name('blog.article');
Route::get('/contact', [ContactController::class, 'index'])->name('blog.contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/articles', [ArticleController::class, 'articles'])->name('allArticles');
    Route::post('/articles/edit', [ArticleController::class, 'editArticles'])->name('editArticles');
    Route::post('/articles/add', [ArticleController::class, 'addArticles'])->name('addArticles');

    Route::post('/contacts/edit', [ContactController::class, 'editContacts'])->name('editContacts');
    Route::post('/contacts/send', [ContactController::class, 'sendContacts'])->name('sendContacts');
    Route::get('/contacts/all', [ContactController::class, 'allContacts'])->name('allContacts');
});

require __DIR__.'/auth.php';
