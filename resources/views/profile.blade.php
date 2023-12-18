<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    
</head>
<body>
        <nav>
            <a href="{{ route('annonces.index') }}">Accueil</a>
            <a href="{{ route('welcome') }}">Bienvenue</a>
            <a href="#recherche">Recherche</a>
            <a href="#partenaires">Partenaires</a>
            <a href="{{ route('annonces.mes') }}">Mes Annonces</a>
            <a href="{{ route('create') }}">Créer une Annonce</a>
            
        </nav>
            
    
    
<div class="neumorphic-container">
    
        <div class="profile">
            <div class="cover-photo"></div>
            <img src="https://picsum.photos/200/200" alt="Profile Picture" class="profile-picture">
            <div class="user-info">
                <h1>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h1>
                <p>Email : {{ Auth::user()->email }}</p>
                <a href="{{ route('edit-profile') }}" class="btn">Modifier le profil</a>
            </div>
            <br>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Déconnexion</button>

             </form>
        </div>



        <!-- Facultatif : Ajoutez des publications ou d'autres sections -->
        <div class="posts">
            
           
            @foreach($annonces as $annonce)
            <div class="annonce">
                <h2>{{ $annonce->titre }}</h2>
                <p>Publié par : {{ $annonce->user->nom }}</p>
                <p>{{ $annonce->description }}</p>
                @if($annonce->image)
                <img src="{{ asset('storage/' . $annonce->image) }}" class="annonce_img" alt="Annonce Image">
                @endif

                

                <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-primary">Voir plus</a>
            
        </div>
        @endforeach
        <!-- Pagination -->

             

            <!-- Ajoutez d'autres publications au besoin -->

</div>        

</body>


</html>