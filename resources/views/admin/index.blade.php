
@extends('layouts.admin')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <link rel="stylesheet" href="{{ asset('css/profil.css') }}">

        <h1 class="h3 mb-0 text-gray-800">Bienvenue sur votre panel</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Annonces à modérer</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 
                         <a href="{{route('admin.ajouterUser')  }}">Ajouter un utilisateur</a>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="{{ route('create') }}">Créer une Annonce</a>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Modifier une annonce</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Messages à modérer</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="{{ route('admin.show') }}">Liste des utilisateurs</a>
                    </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>

        ... <a href="{{ route('annonces.index') }}" class="btn">Retour à l'accueil</a>
...
...
    </div>

@endsection
