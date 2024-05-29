<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD IN LARAVEL 11</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <h1>CRUD DANS LARAVEL 11</h1>
        <hr>
        <a href="/ajouter" class="btn btn-primary mb-3">Ajouter des articles</a>
        <hr>
        @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <div class="row">
          @foreach($articles as $article)
            <div class="col-md-4 mb-4">
              <div class="card">
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $article->nom }}</h5>
                  <p class="card-text">{{ $article->description }}</p>
                  <p class="card-text"><small class="text-muted">{{ $article->date_de_creation }}</small></p>
                  <p class="card-text"><strong>A la une:</strong> {{ $article->is_a_la_une ? 'Oui' : 'Non' }}</p>
                  <a href="/modifier-article/{{ $article->id }}" class="btn btn-info">Modifier</a>
                  <a href="/supprimer-article/{{ $article->id }}" class="btn btn-danger">Supprimer</a>                
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
