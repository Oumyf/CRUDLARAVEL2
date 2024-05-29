<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', [ArticleController::class,'listeArticle']);
Route::get('/ajouter', [ArticleController::class,'ajouterArticle']);
Route::post('/ajouter/traitement/', [ArticleController::class,'ajouterArticleTraitement']);

Route::get('/modifier-article/{id}', [ArticleController::class, 'modifierArticle']);

Route::get('/modifier/traitement', [ArticleController::class, 'modifierArticleTraitement']);


