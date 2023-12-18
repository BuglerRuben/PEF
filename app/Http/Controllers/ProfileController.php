<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;
class ProfileController extends Controller
{
    public function __construct()
    {
        // Ajoutez le middleware 'auth' pour s'assurer que l'utilisateur est authentifié
        $this->middleware('auth');
    }

    public function show()
    {
        $annonces = Annonce::with('user')->get();
        return view('profile', compact('annonces'));
        
    }

    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validez les champs du formulaire selon vos besoins
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        $user->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            // Ajoutez d'autres champs au besoin
        ]);

        return redirect('/profile')->with('success', 'Profil mis à jour avec succès!');
    }
}
