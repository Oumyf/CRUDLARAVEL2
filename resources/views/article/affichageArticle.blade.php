<?php
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->nom }}</title>
</head>
<body>
    <h1>{{ $article->nom }}</h1>
    <img src="{{ $article->image }}" alt="image_article">
    <p>{{ $article->description }}</p>
    <p>{{ $article->date_de_creation }}</p>
    <p>{{ $article->is_a_la_une }}</p>

    <h2>Commentaires</h2>
    <ul>
        @foreach($article->commentaires as $commentaire)
            <li>{{ $commentaire->contenu }}</li>
        @endforeach
    </ul>

    <h2>Ajouter un commentaire</h2>
<form action="/commentaires" method="POST">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <input type="text" name="nom_complet_auteur" value="{{ $article->nom_complet_auteur }}">
    <input type="date" name="date_heure_creation" value="{{ $article->date_heure_creation }}">
    <textarea name="contenu" rows="3" required></textarea>
    <button type="submit">Ajouter</button>
</form>

</body>
</html>
