<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OverGreen</title>
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">
</head>


<body>
    
<div class="wrapper">
  <div class="container">
 
    <div class="sign-in-container">
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <h1>S'identifier</h1>
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <div class="social-links">
          <div>
            <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          </div>
          <div>
            <a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </div>
          <div>
            <a href="https://www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
          </div>
        </div>
        <span>ou utilisez votre compte</span>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
        <input type="password" name="password" required placeholder="Password" autocomplete="current-password">
        <button type="submit" class="form_btn">S'identifier</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay-left">
        <h1>Content de vous revoir!</h1>
        <p>Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
        <button id="signIn" class="overlay_btn">S'identifier</button>
      </div>
      <div class="overlay-right">
        <h1>Bienvenue vous </h1>
        <p>Entrez vos données personnelles et commencez à voyager avec nous</p>
        <button id="signUp" class="overlay_btn">S'inscrire</button>
      </div>
    </div>
  </div>
</div>

<script>
    const signUpBtn = document.getElementById("signUp");
const signInBtn = document.getElementById("signIn");
const container = document.querySelector(".container");

signUpBtn.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});
signInBtn.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

</script>
</body>
</html>