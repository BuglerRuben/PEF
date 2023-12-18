<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/createannonce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">

</head>

<body>
<nav>
        <a href="{{ route('profile') }}">Accueil</a>
        <a href="#recherche">Recherche</a>
        <a href="#partenaires">Partenaires</a>
        <a href="#important">Important</a>
        <a href="{{ route('create') }}">Créer une Annonce</a>
    </nav>

<form action="{{ route('annonces.update', $annonce->id) }}" method="post" enctype="multipart/form-data">
    <h3>Modifier l'annonce</h3>

    @csrf
    @method('PUT') <!-- Ajoutez cette ligne pour indiquer que c'est une requête PUT -->

    <label for="titre"></label>
    <input type="text" name="titre" id="titre" value="{{ $annonce->titre }}" placeholder="Titre" required>
    
    <label for="description"></label>
    <textarea name="description" id="description" placeholder="Description" required>{{ $annonce->description }}</textarea>

    <label for="categorie"></label>
    <input type="text" name="categorie" id="categorie" value="{{ $annonce->categorie }}" placeholder="Catégorie" required>

    <label for="image"></label>
    @if($annonce->image)
        <img src="{{ asset('path/to/your/images/' . $annonce->image) }}" alt="Annonce Image">
    @else
        <p>Aucune image</p>
    @endif
    <input type="file" name="image" id="image" accept="image/*">

    <label for="prix"></label>
    <input type="text" name="prix" id="prix" value="{{ $annonce->prix }}" placeholder="Prix">

    <label for="contact"></label>
    <input type="text" name="contact" id="contact" value="{{ $annonce->contact }}" placeholder="Contact" required>

    <label for="ville"></label>
    <p>{{ $annonce->localisation }}</p>
    <select id="ville" name="localisation" required>
        <option value="" disabled>Choix de la ville</option>
        <option value="tunis" {{ $annonce->localisation == 'tunis' ? 'selected' : '' }}>Tunis</option>
        <option value="sfax" {{ $annonce->localisation == 'sfax' ? 'selected' : '' }}>Sfax</option>
        <option value="sousse" {{ $annonce->localisation == 'sousse' ? 'selected' : '' }}>Sousse</option>
        <option value="nabeul" {{ $annonce->localisation == 'nabeul' ? 'selected' : '' }}>Nabeul</option>
        <!-- Ajoutez d'autres options pour les différentes villes de la Tunisie -->
    </select>

    <button type="submit" class="form_btn">Valider</button>
</form>
</body>
</html>