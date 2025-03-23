<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\PanierProduit;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function getPanierDetails()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non connecté'], 401);
        }

        // Récupérer ou créer le panier de l'utilisateur
        $panier = Panier::firstOrCreate(
            ['users_id' => $user->id], // Condition pour trouver le panier
            ['users_id' => $user->id]  // Données à créer si le panier n'existe pas
        );

        // Récupérer les produits du panier avec leurs détails
        $panierProduits = PanierProduit::with('produit')
            ->where('Panier_id', $panier->id)
            ->get();

        $produits = [];
        foreach ($panierProduits as $panierProduit) {
            $produit = $panierProduit->produit; // Récupérer les détails du produit via la relation
            $produits[] = [
                'id' => $produit->id,
                'nom' => $produit->Nom,
                'categorie' => $produit->Categorie,
                'prix' => $produit->Prix,
                'quantite' => $panierProduit->Quantite,
                'image' => $produit->SrcImage,
            ];
        }

        return response()->json($produits);
    }
}
