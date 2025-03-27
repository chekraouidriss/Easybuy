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
    
        // Récupérer le panier avec ses produits en une seule requête
        $panier = Panier::with(['produits' => function($query) {
            $query->select('produits.id', 'Nom', 'Prix', 'Categorie', 'SrcImage')
                  ->withPivot('quantite');
        }])->where('users_id', $user->id)->first();
    
        // Si le panier n'existe pas, retourner un tableau vide
        if (!$panier) {
            return response()->json([]);
        }
    
        // Formater les données
        $produits = $panier->produits->map(function($produit) {
            return [
                'id' => $produit->id,
                'nom' => $produit->Nom,
                'categorie' => $produit->Categorie,
                'prix' => $produit->Prix,
                'quantite' => $produit->pivot->quantite, // Notez le 'pivot' ici
                'image' => $produit->SrcImage
            ];
        });
    
        return response()->json($produits);
    }
    public function ajouterAuPanier(Request $request) {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite'   => 'required|integer|min:1'
        ]);
    
        $user = Auth::user();
        
        // Solution plus robuste
        $panier = Panier::firstOrCreate(
            ['users_id' => $user->id],
            ['users_id' => $user->id]
        );
    
        $panier->produits()->syncWithoutDetaching([
            $request->produit_id => ['quantite' => $request->quantite]
        ]);
    
        return response()->json(['success' => true]);
    }
    public function supprimerDuPanier($produit_id)
{
    $user = Auth::user();
    
    if (!$user) {
        return response()->json(['error' => 'Utilisateur non connecté'], 401);
    }

    $panier = Panier::where('users_id', $user->id)->first();

    if ($panier) {
        // Supprimer le produit du panier
        $panier->produits()->detach($produit_id);
        
        return response()->json(['success' => true]);
    }

    return response()->json(['error' => 'Panier non trouvé'], 404);
}

}