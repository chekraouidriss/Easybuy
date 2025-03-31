<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{
    // ✅ Afficher tous les produits
    // public function index()
    // {
    //     $produits = Produit::all();
    //     return view('produits.index', compact('produits'));

    // }

    public function index()
    {

        $produits = Produit::all();
        return view('products', compact('produits')); // Assure-toi que la vue est bien dans resources/views/products.blade.php
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
            'Description' => 'required|string|max:1000',
            'SrcImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // Création du produit
        $produit = new Produit();
        $produit->Nom = $request->Nom;
        $produit->Prix = $request->Prix;
        $produit->QntStock = $request->QntStock;
        $produit->Categorie = $request->Categorie;
        $produit->Description = $request->Description;
    
        // Gestion de l'image
        if ($request->hasFile('SrcImage')) {
            $imageName = time() . '.' . $request->file('SrcImage')->getClientOriginalExtension();
            $request->file('SrcImage')->move(public_path('assets/img'), $imageName);
            $produit->SrcImage = 'assets/img/' . $imageName;
        }

    
        // Sauvegarde du produit
        $produit->save();
    
        // Redirection vers /produits
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
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
//     public function update(Request $request, Produit $produit)
// {
//     // Validation des données
//     $request->validate([
//         'Nom' => 'required|string|max:255',
//         'Prix' => 'required|numeric',
//         'QntStock' => 'required|integer',
//         'Categorie' => 'required|string|max:255',
//         'SrcImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
//     ]);

//     // Mise à jour des données du produit
//     $produit->Nom = $request->Nom;
//     $produit->Prix = $request->Prix;
//     $produit->QntStock = $request->QntStock;
//     $produit->Categorie = $request->Categorie;

//     // Vérification si une image a été téléchargée
//     if ($request->hasFile('SrcImage')) {
//         // Supprimez l'ancienne image si elle existe
//         if ($produit->SrcImage && file_exists(public_path($produit->SrcImage))) {
//             unlink(public_path($produit->SrcImage)); // Supprime l'ancienne image
//         }
        
//         // Enregistrez la nouvelle image dans le dossier public/assets/img
//         $image = $request->file('SrcImage');
//         $imageName = time() . '_' . $image->getClientOriginalName(); // Nom unique pour l'image
//         $imagePath = 'assets/img/' . $imageName; // Chemin relatif dans le dossier public
//         $image->move(public_path('assets/img'), $imageName); // Déplace l'image vers public/assets/img
//         $produit->SrcImage = $imagePath; // Met à jour le chemin de l'image dans la base de données
//     }

//     // Sauvegarde des changements
//     $produit->save();

//     // Redirection après la mise à jour
//     return redirect()->route('admin.dashboard')->with('success', 'Produit supprimé avec succès.');
// }

public function update(Request $request, $id)
{
    // Validation des données
    $validated = $request->validate([
        'Nom' => 'required|string|max:255',
        'Prix' => 'required|numeric',
        'QntStock' => 'required|integer',
        'Categorie' => 'required|string|max:255',
        'SrcImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
    ]);

    // Recherche du produit par son ID
    $produit = Produit::findOrFail($id);

    // Vérifier si une nouvelle image est téléchargée
    if ($request->hasFile('SrcImage')) {
        // Supprimer l'ancienne image s'il y en a une
        if ($produit->SrcImage && file_exists(public_path($produit->SrcImage))) {
            unlink(public_path($produit->SrcImage));
        }

        // Définir le nouveau chemin de stockage dans public/assets/img/produits
        $image = $request->file('SrcImage');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Nom unique
        $image->move(public_path('assets/img/'), $imageName);

        // Mettre à jour le chemin de l'image dans la base de données
        $produit->SrcImage = 'assets/img/' . $imageName;
    }

    // Mise à jour des autres données
    $produit->update([
        'Nom' => $request->Nom,
        'Prix' => $request->Prix,
        'QntStock' => $request->QntStock,
        'Categorie' => $request->Categorie,
        'SrcImage' => $produit->SrcImage, // Mise à jour avec la nouvelle image
    ]);

    // Sauvegarde du produit mis à jour
    $produit->save();

    // Redirection après mise à jour
    return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
}



    // ✅ Supprimer un produit
    // public function destroy(Produit $produit)
    // {
    //     $produit->delete(); // Supprime le produit
    //     return redirect()->route('admin.dashboard')->with('success', 'Produit supprimé avec succès.');
    // }

    public function destroy(Request $request)
{
    $productId = $request->input('productId');  // Get the product ID from the hidden input

    // Find the product by ID and delete it
    $produit = Produit::findOrFail($productId);
    $produit->delete();

    // Redirect back to the products page with a success message
    return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
}

    
}
