<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">
    <title>Document</title>
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
    
<section class="resultats-recherche">
    <h2>Résultats de la recherche</h2>
    <div class="annonces-container">
        @foreach($annonces as $annonce)
            <div class="annonce">
                <h3>{{ $annonce->titre }}</h3>
                <p>{{ $annonce->description }}</p>
                <a href="{{ route('annonces.show', $annonce->id) }}">Voir les détails</a>
            </div>
        @endforeach
    </div>
    <button id="voir-plus-btn">Voir Plus</button>
</section>

</body>
</html>