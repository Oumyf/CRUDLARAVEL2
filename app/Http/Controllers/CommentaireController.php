<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contenu' => 'required|string',
            'nom_complet_auteur' => 'required|string|max:255',
            'article_id' => 'required|exists:articles,id',
            'date_heure_creation' => 'required|date',

        ]);

        Commentaire::create($validatedData);

        return redirect()->route('article.details', ['id' => $request->article_id])
            ->with('status', 'Commentaire ajouté avec succès');
    }

    public function mettre_a_jour($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaire.modifier', compact('commentaire'));
    }

    public function modifier(Request $request, $id)
    {
        $validatedData = $request->validate([
            'contenu' => 'required|string',
            'nom_complet_auteur' => 'required|string|max:255',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($validatedData);

        return redirect()->route('article.details', ['id' => $commentaire->article_id])
            ->with('status', 'Commentaire mis à jour avec succès');
    }

    public function detruire($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $articleId = $commentaire->article_id;
        $commentaire->delete();

        return redirect()->route('article.details', ['id' => $articleId])
        
            ->with('status', 'Commentaire supprimé avec succès');
    }
}
