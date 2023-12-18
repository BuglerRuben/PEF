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

<form action="{{ route('annonces.store') }}" method="post" enctype="multipart/form-data" >
    <h3>Créer une annonce</h3>

    @csrf
    <label for="titre"></label>
    <input type="text" name="titre" id="titre" placeholder="Titre" required>
    
    <label for="description"></label>
    <textarea name="description" id="description" placeholder="Description" required></textarea>

    <label for="categorie"></label>
    <input type="text" name="categorie" id="categorie" placeholder="Catégorie" required>

    <label for="image"></label>
    <input type="file" name="image" id="image" accept="image/*">

    <label for="prix"></label>
    <input type="text" name="prix" id="prix" placeholder="Prix" required>

    <label for="contact"></label>
    <input type="text" name="contact" id="contact" placeholder="Contact" required>

    <label for="ville"></label>
<select id="ville" name="localisation"  required>
    <option value="" disabled selected>Choisissez une ville</option>
    <option value="tunis">Tunis</option>
    <option value="sfax">Sfax</option>
    <option value="sousse">Sousse</option>
    <option value="nabeul">Nabeul</option>
    <!-- Ajoutez d'autres options pour les différentes villes de la Tunisie -->
</select>


    <button type="submit" class="form_btn">Créer l'annonce</button>
</form>
</body>
</html>