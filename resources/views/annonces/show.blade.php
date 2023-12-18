<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">
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
  
    <div class="annonce-details">
@if($annonce->image)
                <img src="{{ asset('storage/' . $annonce->image) }}" class="annonce_img" alt="Annonce Image">
            @endif

        <h1>{{ $annonce->titre }}</h1>
        <p>Publié par : {{ $annonce->user->nom }}</p>
        <p class="categorie">Catégorie: {{ $annonce->categorie }}</p>
        <p class="prix">Prix: {{ $annonce->prix }}</p>
        <p class="description">{{ $annonce->description }}</p>
        <p class="contact">Contact: {{ $annonce->contact }}</p>
        <p class="localisation">Localisation: {{ $annonce->localisation }}</p>
        <span class="date">Date de publication : {{ $annonce->created_at}} </span><br/>
        

        <!-- Ajoutez d'autres détails ici -->

        <a href="{{ route('annonces.index') }}" class="retour-btn">Retour à la liste</a>
    </div>
  
</body>
</html>