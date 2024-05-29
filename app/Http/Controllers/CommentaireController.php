<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'contenu' => 'required|string',
            'nom_complet_auteur' => 'required|string',
            'date_heure_creation' => 'required|date',

        ]);

        Commentaire::create($request->all());

        return redirect()->route('articles', $request->article_id)->with('status', 'Commentaire ajouté avec succès.');
    }
}
