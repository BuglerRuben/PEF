<?php

/// app/Http/Controllers/AnnonceController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('user')->get();

        return view('annonces.index', ['annonces' => $annonces]);
    }

    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);

        return view('annonces.show', ['annonce' => $annonce]);
    }

    public function create()
    {
        return view('annonces.create');
    }

    public function store(Request $request)
{
    // Validez les données du formulaire (assurez-vous que 'user_id' n'est pas requis ici)
    

    // Récupérez l'utilisateur authentifié
    $user = Auth::user();

    // Créez une nouvelle annonce en associant l'utilisateur
    $annonce = new Annonce([
        'titre' => $request->input('titre'),
        'description' => $request->input('description'),
        'categorie' => $request->input('categorie'),
        'image' => $request->file('image')->store('images', 'public'), // Gérez l'enregistrement de l'image comme nécessaire
        'prix' => $request->input('prix'),
        'contact' => $request->input('contact'),
        'localisation' => $request->input('localisation'),
    ]);
    $imagePath['image']=$request->file('image')->store('images','public');


    // Associez l'utilisateur à l'annonce
    $annonce->user()->associate($user);

    // Enregistrez l'annonce
    $annonce->save();

    // Redirigez l'utilisateur vers la page des annonces avec un message de succès
    return redirect()->route('profile')->with('success', 'Annonce créée avec succès!');
}

public function mesAnnonces()
{
    // Récupérer l'ID de l'utilisateur connecté
    $userId = Auth::id();

    // Récupérer uniquement les annonces de l'utilisateur connecté
    $annonces = Annonce::with('user')->where('user_id', $userId)->get();

    return view('annonces.mes_annonces', compact('annonces'));
}

public function edit($id)
{
    // Logique pour récupérer l'annonce à modifier
    $annonce = Annonce::findOrFail($id);

    return view('annonces.edit', compact('annonce'));
}
public function update(Request $request, $id)
{
    // Validez les champs du formulaire selon vos besoins
    $validatedData = $request->validate([
        'titre' => 'required',
        'description' => 'required',
        'categorie' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'prix' => 'numeric|nullable',
        'contact' => 'required',
        'localisation' => 'required',
    ]);
    $imagePath['image']=$request->file('image')->store('images','public');

   
    //$imagePath = $request->file('image')->store('images', 'public');


    // Récupérez l'annonce à mettre à jour
    $annonce = Annonce::findOrFail($id);

    // Mettez à jour les champs de l'annonce avec les nouvelles valeurs
    $annonce->titre = $validatedData['titre'];
    $annonce->description = $validatedData['description'];
    $annonce->categorie = $validatedData['categorie'];
    $annonce->prix = $validatedData['prix'];
    $annonce->contact = $validatedData['contact'];
    $annonce->localisation = $validatedData['localisation'];

    // Vérifiez si une nouvelle image a été fournie
    if ($request->hasFile('image')) {
        // Téléchargez la nouvelle image
        $imagePath['image']=$request->file('image')->store('images','public');

        //$imagePath = $request->file('image')->store('images', 'public');

        // Mettez à jour le chemin de l'image de l'annonce
        $annonce->image = $imagePath;
    }

    // Enregistrez les modifications dans la base de données
    $annonce->save();

    // Redirigez l'utilisateur vers la liste des annonces avec un message de succès
    return redirect()->route('annonces.mes')->with('success', 'Annonce modifiée avec succès!');
}

public function destroy($id)
{
    // Récupérer l'annonce à supprimer
    $annonce = Annonce::findOrFail($id);

    // Supprimer l'image associée si elle existe
    if ($annonce->image) {
        Storage::disk('public')->delete($annonce->image);
    }

    // Supprimer l'annonce de la base de données
    $annonce->delete();

    // Rediriger l'utilisateur avec un message de succès
    return redirect()->route('annonces.index')->with('success', 'Annonce supprimée avec succès!');
}

public function search(Request $request)
{
    // Récupérer les données du formulaire de recherche
    $categories = $request->input('categories');
    $searchTerm = $request->input('search');

    // Logique de recherche dans la base de données en utilisant les variables ci-dessus
    $results = Annonce::where('categorie', $categories)
                    ->where('titre', 'like', '%' . $searchTerm . '%')
                    // Ajoutez d'autres conditions de recherche au besoin
                    ->get();

    // Retourner les résultats de recherche à la vue
    return view('annonces.search', ['annonces' => $results]);
}

}
