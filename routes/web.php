<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('blog.index');
Route::view('/about','about')->name('blog.about');
Route::get('/blog', [ArticleController::class, 'blog'])->name('blog.articles');
Route::get('/contact', [ContactController::class, 'index'])->name('blog.contact');
Route::get('/logout', [LoginController::class, 'logout'])->name('blog.logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/articles/all', [ArticleController::class, 'allArticles'])->name('allArticles');
    Route::get('/articles/edit/{singleArticle}', [ArticleController::class, 'editArticle'])->name('editArticle');
    Route::put('/articles/update/{singleArticle}', [ArticleController::class, 'updateArticle'])->name('updateArticle');
    Route::get('/articles/delete/{singleArticle}', [ArticleController::class, 'deleteArticle'])->name('deleteArticle');
    Route::post('/articles/add', [ArticleController::class, 'addArticles'])->name('addArticles');

    Route::get('/contacts/edit/{singleContact}', [ContactController::class, 'editContact'])->name('editContact');
    Route::put('/contacts/update/{singleContact}', [ContactController::class, 'updateContact'])->name('updateContact');
    Route::post('/contacts/send', [ContactController::class, 'sendContacts'])->name('sendContacts');
    Route::get('/contacts/delete/{contact}', [ContactController::class, 'deleteContact'])->name('deleteContact');
    Route::get('/contacts/all', [ContactController::class, 'allContacts'])->name('allContacts');
});

require __DIR__.'/auth.php';
