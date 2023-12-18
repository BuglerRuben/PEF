<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editprofil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">



</head>

<body>
<nav>
        <a href="{{ route('annonces.index') }}">Accueil</a>
        <a href="#recherche">Recherche</a>
        <a href="#partenaires">Partenaires</a>
        <a href="#important">Important</a>
        <a href="{{ route('create') }}">Créer une Annonce</a>
    </nav>
<div class="container">
        <form action="{{ route('update-profile') }}" method="post">
            <h2>Modifier le profil</h2>

            @csrf
            @method('put')

            <!-- Ajoutez ici les champs que l'utilisateur peut modifier -->
            <div class="form-group">
                <label for="nom"></label>
                <input type="text" id="nom" name="nom" value="{{ Auth::user()->nom }}" placeholder="Nom" required>
            </div>

            <div class="form-group">
                <label for="prenom"></label>
                <input type="text" id="prenom" name="prenom" value="{{ Auth::user()->prenom }}" placeholder="Prenom" required>
            </div>

            <!-- Ajoutez d'autres champs au besoin -->

            <button type="submit" class="form_btn">Enregistrer les modifications</button>
        </form>
    </div>
</body>
</html>