<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/blog', [ArticleController::class, 'articles']);
Route::view('/about', 'about');

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send-message', [ContactController::class, 'sendMessage']);

Route::get('/admin/all-contacts', [ContactController::class, 'allContacts']);
Route::get('/admin/delete-contact/{id}', [ContactController::class, 'deleteContact']);
Route::get('/admin/edit-contact/{id}', [ContactController::class, 'editContact']);
Route::put('/admin/update-contact/{id}', [ContactController::class, 'updateContact']);

Route::get('/admin/all-articles', [ArticleController::class, 'allArticles'])->name('articles');
Route::get('/admin/delete-article/{id}', [ArticleController::class, 'deleteArticle']);
Route::get('/admin/edit-article/{id}', [ArticleController::class, 'editArticle']);
Route::put('/admin/update-article/{id}', [ArticleController::class, 'updateArticle']);
Route::post('/admin/add-article', [ArticleController::class, 'addArticle']);

