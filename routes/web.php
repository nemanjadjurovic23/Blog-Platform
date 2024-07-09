<?php

use App\Http\Controllers\AdminController;
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

    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('/panel', 'index')->name('admin.panel');
        Route::get('/panel', 'allArticles')->name('admin.panel');
    });

    Route::controller(ArticleController::class)->prefix('/articles')->name('articles.')->group(function (){
        Route::get('/all', 'allArticles')->name('all');
        Route::get('/edit/{singleArticle}','editArticle')->name('edit');
        Route::put('/update/{singleArticle}', 'updateArticle')->name('update');
        Route::get('/delete/{singleArticle}', 'deleteArticle')->name('delete');
        Route::post('/add','addArticles')->name('add');
    });

    Route::controller(ContactController::class)->prefix('/contacts')->name('contacts.')->group(function (){
        Route::get('/contacts/edit/{singleContact}', 'editContact')->name('edit');
        Route::put('/contacts/update/{singleContact}', 'updateContact')->name('update');
        Route::post('/contacts/send', 'sendContacts')->name('send');
        Route::get('/contacts/delete/{singleContact}', 'deleteContact')->name('delete');
        Route::get('/contacts/all','allContacts')->name('all');
    });
});

require __DIR__.'/auth.php';
