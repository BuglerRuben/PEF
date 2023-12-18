<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <title>OverGreen</title>
</head>

<body>
<header>
        <div class="header-content">
            <h1>OverGreen</h1>
            <h3>Echanger vos déchets industriels en toute simplicité</h3>
        </div>
        <video id="background-video" autoplay loop muted>

            <source src="{{ asset('images/decharge.mp4') }}" type="video/mp4">
            </video>
            </div>
</header>

    <nav>
        <a href="{{ route('profile') }}">Accueil</a>
        <a href="#recherche">Recherche</a>
        <a href="#partenaires">Partenaires</a>
        <a href="#important">Important</a>
        <a href="{{ route('create') }}">Créer une Annonce</a>
        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Nous sommes à votre disposition') }}

                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    </nav>
     <div class="box">
             <div class="contain">
                <div class="gallery">
                    <img src="{{ asset('images/traitement.jpeg') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/inertes.jpg') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/banals2.jpg') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/speciaux.jpg') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/12.jpg') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/banals.png') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/pneu.jpg') }}" alt="Bourse de Déchets 1" class="item">
                    <img src="{{ asset('images/bois.jpg') }}" alt="Bourse de Déchets 1" class="item">
                </div>    
             </div>    
        </div>
    <section id="bourses-dechets">
            <img src="/images/pi.jpg" alt="Logo Bourse de Déchets" class="logo">
 
    <p>
        OverGreen est une plateforme en ligne qui facilite l'échange et la valorisation des déchets industriels
        entre différentes entreprises et industries. Cette initiative vise à encourager le recyclage, la réutilisation, et
        la réduction des déchets, contribuant ainsi à promouvoir une économie plus circulaire et durable.
    </p>
</div>


    <section class="dernieres-annonces">
        <h2> Les dernières annonces</h2>

        <div class="annonces-container">
            @foreach($annonces as $annonce)
                <div class="annonce">
                    <h3>{{ $annonce->titre }}</h3>
                    <p>{{ $annonce->description }}</p>
                    @if ($annonce->image)
                    @endif
                        
                    <a href="{{ route('annonces.show', $annonce->id) }}">Voir les détails</a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="creer-annonce">

    <a href="{{ route('create') }}" class="creer-annonce-btn">Créer une Annonce</a>
    </section>

    <section class="recherche-categorie">
        <div class="recherche">
            <h2>Recherche d'Annonces</h2>
            <form action="{{ route('annonces.search') }}" method="post">
    @csrf
    <div class="input-group">
        <label for="categories"></label>
        <select id="categories" name="categories">
            <option value="toutes">Toutes les catégories</option>
            <option value="electronique">Électronique</option>
            <option value="materiaux">Matériaux</option>
            <!-- Ajouter d'autres catégories -->
        </select>
    </div>

    <div class="input-group">
        <label for="search"></label>
        <input type="text" id="search" name="search" placeholder="Rechercher...">
    </div>

    <button type="submit">Rechercher</button>
</form>

        </div>

    
    </section>

    <section class="resultats-recherche">
   

</section>
    </section>
    <section class="partenaires">
        <a name="partenaires"></a>
        <h2>Nos partenaires</h2>
        <div class="logo-grid">
            <div class="logo-item">
                <img src="images/9.png" alt="Partenaire 2">
                <div class="logo-caption">
                    <h5>Bourses</h5>
                </div>
            </div>
            <div class="logo-item">
                <img src="images/lg.jpg" alt="Partenaire 2">
                <div class="logo-caption">
                    <h5>Golden</h5>
                </div>
            </div>
            <div class="logo-item">
                <img src="images/8.png" alt="Partenaire 2">
                <div class="logo-caption">
                    <h5>Agro</h5>
                </div>
            </div>
            <div class="logo-item">
                <img src="images/6.png" alt="Partenaire 2">
                <div class="logo-caption">
                    <h5>Compus</h5>
                </div>
            </div>
            <div class="logo-item">
                <img src="images/espin.png" alt="Partenaire 2">
                <div class="logo-caption">
                    <h5>Espin</h5>
                </div>
            </div>
            <div class="logo-item">
                <img src="images/7.jpg" alt="Partenaire 2">
                <div class="logo-caption">
                    <h5>Oeil</h5>
                </div>
            </div>
            <!-- Ajouter d'autres partenaires ici -->
        </div>
    </section>


   

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var annonces = document.querySelectorAll('.annonce');

        annonces.forEach(function (annonce) {
            annonce.addEventListener('click', function () {
                var annonceId = this.getAttribute('data-id');
                window.location.href = '/annonce/' + annonceId;
            });
        });
    });
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
