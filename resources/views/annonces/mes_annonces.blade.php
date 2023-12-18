<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/mes_annonces.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
   

    
</head>
<body>
    
<nav>
        <a href="{{ route('annonces.index') }}">Accueil</a>
        <a href="#recherche">Recherche</a>
        <a href="#partenaires">Partenaires</a>
        <a href="{{ route('annonces.mes') }}">Mes Annonces</a>
        <a href="{{ route('create') }}">Créer une Annonce</a>
        <a href="{{ route('logout') }}">logout</a>
</nav>    
<div class="annonces-list">
        @foreach($annonces as $annonce)
            <div class="annonce">
                <div class="annonce-header">
                    <h2>{{ $annonce->titre }}</h2>
                    <p>Publié par {{ $annonce->user->nom }} le {{ $annonce->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="annonce-content">
                    <p>{{ $annonce->description }}</p>
                </div>
                <div class="annonce-footer">
    <a href="{{ route('annonces.show', $annonce->id) }}" class="btn-primary">Voir plus</a>
    <br>
    <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn-secondary">Modifier</a>

<br>
    <!-- Ajoutez le style pour le bouton de suppression -->
    <form action="{{ route('annonces.destroy', $annonce->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-danger">Supprimer</button>
        
    </form>
</div>
            
        @endforeach
    </div>
</body>
</html>