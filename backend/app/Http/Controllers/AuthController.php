<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Produit;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('log_in');
    }

    // Traiter la connexion
    public function login(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Le champ email est obligatoire.',
            'password.required' => 'Le champ mot de passe est obligatoire.',
        ]);

        // Récupérer l'email et le mot de passe
        $email = $request->input('email');
        $password = $request->input('password');

        Log::info('Tentative de connexion avec email : ' . $email); // Log l'email

        // 1. Vérifier si l'utilisateur est un administrateur
        if (Admin::isAdmin($email, $password)) {
            Log::info('Administrateur trouvé : ' . $email); // Log si l'admin est trouvé

            // Connecter l'utilisateur en tant qu'administrateur
            Auth::guard('admin')->loginUsingId(Admin::where('Email', $email)->first()->id);

            return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie en tant qu\'administrateur !');
        }

        // 2. Vérifier si l'utilisateur est un utilisateur normal
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();

            Log::info('Utilisateur trouvé : ' . $email); // Log si l'utilisateur est trouvé
            return redirect()->route('shop')->with('success', 'Connexion réussie !');
        }

        // En cas d'échec, retourner avec une erreur
        Log::error('Échec de la connexion pour email : ' . $email); // Log en cas d'échec
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }

    // Afficher le formulaire d'inscription
    public function showSignupForm()
    {
        return view('log_in'); // Utiliser la même vue pour le signup
    }

    // Traiter l'inscription
    public function signup(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'adresse' => 'required|string|max:255',
        'ville' => 'required|string|max:100',
        'code' => 'required|string|max:20',
        'telephone' => 'required|string|max:20',
    ], [
        'nom.required' => 'Le champ nom est obligatoire.',
        'email.required' => 'Le champ email est obligatoire.',
        'email.unique' => 'Cet email est déjà utilisé.',
        'password.required' => 'Le champ mot de passe est obligatoire.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        'adresse.required' => 'Le champ adresse est obligatoire.',
        'ville.required' => 'Le champ ville est obligatoire.',
        'code.required' => 'Le champ code postal est obligatoire.',
        'telephone.required' => 'Le champ téléphone est obligatoire.',
    ]);

    // Créer un nouvel utilisateur
    $user = User::create([
        'name' => $request->nom,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'adresse' => $request->adresse,
        'ville' => $request->ville,
        'code_postale' => $request->code,
        'telephone' => $request->telephone,
    ]);

    // Connecter l'utilisateur après l'inscription
    Auth::login($user);

    // Rediriger vers la page shop après inscription
    return redirect()->route('shop')->with('success', 'Inscription réussie !');
}

    // Afficher la page shop
    public function shop()
    {
        // Récupérer tous les produits depuis la base de données
        $produits = Produit::all(); // Assurez-vous d'importer le modèle Produit en haut du fichier
    
        // Passer les produits à la vue shop
        return view('shop', compact('produits'));
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecter l'utilisateur
        $request->session()->invalidate(); // Invalider la session
        $request->session()->regenerateToken(); // Régénérer le token CSRF
        return redirect('/'); // Rediriger vers la page d'accueil
    }
    public function search(Request $request)
{
    // Récupérer le terme de recherche depuis la requête
    $query = $request->input('query');

    // Effectuer la recherche dans la base de données
    $produits = Produit::where('Nom', 'LIKE', "%{$query}%")
                        ->orWhere('Description', 'LIKE', "%{$query}%")
                        ->get();

    // Passer les résultats à la vue shop
    return view('shop', compact('produits'));
}
public function adminDashboard()
{
    // Calculer les statistiques des produits
    $totalProduits = Produit::count();
    $produitsEnStock = Produit::where('QntStock', '>', 0)->count();
    $ruptureDeStock = Produit::where('QntStock', '=', 0)->count();
    $produits = Produit::all(); // Récupérer tous les produits

    // Passer les données à la vue admin
    return view('admin', compact('totalProduits', 'produitsEnStock', 'ruptureDeStock', 'produits'));
}


}
