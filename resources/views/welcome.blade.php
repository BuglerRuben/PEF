<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OverGreen</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    
    </head>
    <body>
    <!-- En-tête -->
    <header>
        <nav>
            <div class="logo">OverGreen</div>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="{{ route('annonces.index') }}">Annonces</a></li>
                <li><a href="#">À Propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Section principale -->
    <section class="hero">
        <h1>Bienvenue sur OverGreen</h1>
        <h3>Connectez-vous pour acheter, vendre ou échanger des matériaux recyclés et réutilisables.</h3>
        <a href="{{ route('annonces.index') }}" class="btn">visiter site</a>
        <a href="{{ route('login') }}" class="btn">Se Connecter</a>
    </section>

    <!-- Section des fonctionnalités -->
    <section class="features">
        <div class="feature">
            <img src="/images/loupe.png" alt="Icone 1">
            <h2>Trouvez des Matériaux</h2>
            <p>Parcourez les annonces pour trouver les matériaux dont vous avez besoin.</p>
        </div>
        <div class="feature">
            <img src="/images/megaphone.png" alt="Icone 2">
            <h2>Publiez des Annonces</h2>
            <p>Publiez des annonces pour vendre ou échanger vos matériaux excédentaires.</p>
        </div>
        <div class="feature">
            <img src="/images/dashboard.png" alt="Icone 3">
            <h2>Gestion Facile</h2>
            <p>Gérez vos annonces et vos transactions en un seul endroit.</p>
        </div>
    </section>

    <!-- Pied de page -->
    <footer>
        <p>&copy; 2023 Overgreen</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
