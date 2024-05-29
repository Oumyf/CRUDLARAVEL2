<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function listeArticle()
    {
        $articles = Article::all();
        return view('article.liste', compact('articles'));
    }

    public function afficher_details($id){
        // $article = DB::table('articles')->where('id', $id)->get();
        // $article = Article::find($id);
        $article = Article::findOrFail($id);

        return view('article.details', compact('article'));
    }

    public function ajouterArticle()
    {
        return view('article.ajouter');
    }

    public function ajouterArticleTraitement(Request $request)
{
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'date_de_creation' => 'required|date',
        'image' => 'required',
        'is_a_la_une' => 'required|boolean',
    ]);

    if ($request->hasFile('image')) {
        // Stocker l'image et récupérer le chemin
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    Article::create($validatedData);

    return redirect()->route('article.index')->with('status', "L'article a été ajouté avec succès");
}

    public function modifierArticle($id)
    {
        $article = Article::findOrFail($id);
        return view('article.modifier', compact('article'));
    }

    public function modifierArticleTraitement(Request $request) {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_de_creation' => 'required',
            'image' => 'required',
        ]);
        $article = Article::find($request->id);
        $article ->nom = $request->nom;
        $article ->description = $request->description;
        $article ->date_de_creation = $request->date_de_creation;
        $article ->image = $request->image;
        $article ->is_a_la_une = $request->is_a_la_une;
        $article ->update();
        return redirect('/article')->with('status',"L'article a bien été modifié avec succès");

    }

    public function supprimerArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index')->with('status', "L'article a bien été supprimé avec succès");
    }

    public function Affichage($id)
    {
        $article = Article::with('commentaires')->findOrFail($id);
        return view('article.affichageArticle', compact('article'));
    }
}
