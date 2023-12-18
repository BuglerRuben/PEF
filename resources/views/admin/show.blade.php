<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/registre.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>
<body>
        
 

<div class="container">

        <h3>Liste des utilisateurs</h3>

        <div class="user-info">
                
    @foreach ($users as $user)
    
         <p>{{ $user->nom }}-{{ $user->prenom }}-{{ $user->email }}-{{ $user->admin }}</p>
    
    @endforeach
 
            </h1>
            <a href="{{ route('admin.index') }}" class="btn">Retour à la liste</a>
        </div>
        <br>
        
            @csrf
           
         </form>

</div>

  
</body>
</html>