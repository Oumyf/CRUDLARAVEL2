<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function ajouterArticle(Request $request) {

        if ($request->hasFile('image')) {
            // Stocker l'image et récupérer le chemin
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        return view('article.ajouter');

        Article::create($validatedData);

        return redirect()->route('articles.index')->with('succes', 'Article créé avec succès.');
        
    }
    
    public function ajouterArticleTraitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_de_creation' => 'required',
            'is_a_la_une' => 'required',
            'image' => 'required',
        ]);

        $article = new Article();
        $article ->nom = $request->nom;
        $article ->description = $request->description;
        $article ->date_de_creation = $request->date_de_creation;
        $article ->image = $request->image;
        $article ->is_a_la_une = $request->is_a_la_une;

        $article ->save();

        return redirect('/ajouter')->with('status',"L'article a  été ajouté avec succès");

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_a_la_une' => 'required|boolean',
        ]);

    
    }

    public function listeArticle(){
        $articles = Article ::all();
        return view('article.liste' , compact('articles'));
    }
}
