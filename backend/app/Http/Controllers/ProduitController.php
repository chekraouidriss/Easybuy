<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    // ✅ Afficher tous les produits
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    // ✅ Afficher le formulaire d'ajout de produit
    public function create()
    {
        return view('produits.create');
    }

    // ✅ Ajouter un produit
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prix' => 'required|numeric',
            'QntStock' => 'required|integer',
            'Categorie' => 'required|string|max:255',
            'SrcImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // Création du produit
        $produit = new Produit();
        $produit->Nom = $request->Nom;
        $produit->Prix = $request->Prix;
        $produit->QntStock = $request->QntStock;
        $produit->Categorie = $request->Categorie;
    
        // Gestion de l'image
        if ($request->hasFile('SrcImage')) {
            $imageName = time() . '.' . $request->file('SrcImage')->getClientOriginalExtension();
            $request->file('SrcImage')->move(public_path('assets/img'), $imageName);
            $produit->SrcImage = 'assets/img/' . $imageName;
        }
    
        // Sauvegarde du produit
        $produit->save();
    
        // Redirection vers /produits
        return redirect()->route('admin.dashboard')->with('success', 'Produit supprimé avec succès.');
    }
    
    // ✅ Afficher un produit spécifique
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    // ✅ Afficher le formulaire de modification
    public function edit(Produit $produit)
{
    // Retourner les données du produit en format JSON pour être utilisé dans la modale
    return response()->json($produit);
}

    // ✅ Mettre à jour un produit
    public function update(Request $request, Produit $produit)
{
    // Validation des données
    $request->validate([
        'Nom' => 'required|string|max:255',
        'Prix' => 'required|numeric',
        'QntStock' => 'required|integer',
        'Categorie' => 'required|string|max:255',
        'SrcImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Mise à jour des données du produit
    $produit->Nom = $request->Nom;
    $produit->Prix = $request->Prix;
    $produit->QntStock = $request->QntStock;
    $produit->Categorie = $request->Categorie;

    // Vérification si une image a été téléchargée
    if ($request->hasFile('SrcImage')) {
        // Supprimez l'ancienne image si elle existe
        if ($produit->SrcImage && file_exists(public_path($produit->SrcImage))) {
            unlink(public_path($produit->SrcImage)); // Supprime l'ancienne image
        }
        
        // Enregistrez la nouvelle image dans le dossier public/assets/img
        $image = $request->file('SrcImage');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Nom unique pour l'image
        $imagePath = 'assets/img/' . $imageName; // Chemin relatif dans le dossier public
        $image->move(public_path('assets/img'), $imageName); // Déplace l'image vers public/assets/img
        $produit->SrcImage = $imagePath; // Met à jour le chemin de l'image dans la base de données
    }

    // Sauvegarde des changements
    $produit->save();

    // Redirection après la mise à jour
    return redirect()->route('admin.dashboard')->with('success', 'Produit supprimé avec succès.');
}
    // ✅ Supprimer un produit
    public function destroy(Produit $produit)
    {
        $produit->delete(); // Supprime le produit
        return redirect()->route('admin.dashboard')->with('success', 'Produit supprimé avec succès.');
    }
}
