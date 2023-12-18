<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/createannonce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <nav>
        <a href="{{ route('profile') }}">Accueil</a>
        <a href="#recherche">Recherche</a>
        <a href="#partenaires">Partenaires</a>
        <a href="#important">Important</a>
        <a href="{{ route('create') }}">Créer une Annonce</a>
    </nav>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('admin.ajouter_user_traitement') }}" method="post" enctype="multipart/form-data">

        <h3>Ajouter un utilisateur</h3>

        @csrf
           
        <label for="nom"></label>
        <input type="text" name="titre" id="titre" placeholder="Nom" required>

        <label for="prenom"></label>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom" required>

        <label for="email"></label>
        <input type="email" name="email" id="_email" placeholder="e-mail" required>

        <label for="password"></label>
        <input type="password" name="password" id="_password" placeholder="Mot de passe" required>

        <button type="submit" class="form_btn">Créer l'utilisateur</button>
        <br> <br/>
        <a href="" class="form_btn">Revenir à la liste des utilisateurs</a>
    </form>
</body>

</html>
