<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', [ArticleController::class, 'listeArticle'])->name('article.index');
Route::get('/article/{id}', [ArticleController::class, 'afficher_details'])->name('article.show');
Route::get('/ajouter', [ArticleController::class, 'ajouterArticle'])->name('article.ajouter');
Route::post('/ajouter/traitement', [ArticleController::class, 'ajouterArticleTraitement'])->name('article.ajouterTraitement');
Route::get('/modifier-article/{id}', [ArticleController::class, 'modifierArticle'])->name('article.update');
Route::post('/modifier/traitement/{id}', [ArticleController::class, 'modifierArticleTraitement'])->name('article.modifierTraitement');
Route::get('/supprimer-article/{id}', [ArticleController::class, 'supprimerArticle'])->name('article.supprimer');

// Nouvelle route pour les commentaires
Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');



