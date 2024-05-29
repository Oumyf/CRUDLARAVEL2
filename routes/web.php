<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', [ArticleController::class, 'listeArticle'])->name('article.index');
Route::get('/article/{id}', [ArticleController::class, 'afficher_details'])->name('article.details');
Route::get('/ajouter', [ArticleController::class, 'ajouterArticle'])->name('article.ajouter');
Route::post('/ajouter/traitement', [ArticleController::class, 'ajouterArticleTraitement'])->name('article.ajouterTraitement');
Route::get('/modifier-article/{id}', [ArticleController::class, 'modifierArticle'])->name('article.modifier');
Route::get('/modifier/traitement', [ArticleController::class, 'modifierArticleTraitement']);
Route::get('/supprimer-article/{id}', [ArticleController::class, 'supprimerArticle'])->name('article.supprimer');

// Route pour créer un nouveau commentaire
Route::get('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');

// Route pour afficher le formulaire de modification d'un commentaire
Route::get('/commentaires/{id}/modifier', [CommentaireController::class, 'mettre_a_jour'])->name('commentaires.mettre_a_jour');

// Route pour mettre à jour un commentaire
Route::put('/commentaires/{id}', [CommentaireController::class, 'modifier'])->name('commentaires.modifier');

// Route pour supprimer un commentaire
Route::delete('/commentaires/{id}', [CommentaireController::class, 'detruire'])->name('commentaires.detruire');





