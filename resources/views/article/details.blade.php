<!-- resources/views/article/details.blade.php -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Détails de l'article</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <div class="card">
      <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->image }}">
      <div class="card-body">
        <h5 class="card-title">{{ $article->nom }}</h5>
        <p class="card-text">{{ $article->description }}</p>
        <p class="card-text"><small class="text-muted">{{ $article->date_de_creation }}</small></p>
        <p class="card-text"><strong>A la une:</strong> {{ $article->is_a_la_une ? 'Oui' : 'Non' }}</p>
      </div>
    </div>

    <hr>

    <div class="comments-section">
      <h4>Commentaires</h4>
      @foreach($article->commentaires as $commentaire)
        <div class="card mb-2">
          <div class="card-body">
            <p class="card-text">{{ $commentaire->contenu }}</p>
            <p class="card-text">{{ $commentaire->nom_complet_auteur }}</p>
            <p class="card-text"><small class="text-muted">Posté le {{ $commentaire->created_at }}</small></p>
          </div>
        </div>
      @endforeach
    </div>

    <hr>

    <div class="add-comment-section">
      <h4>Ajouter un commentaire</h4>
      <form action="{{ route('commentaires.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="mb-3">
            <label for="nom_complet_auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur">
            <br>
            <label for="contenu" class="form-label">Commentaire</label>
          <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
