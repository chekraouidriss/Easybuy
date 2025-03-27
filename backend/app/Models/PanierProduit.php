<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierProduit extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'panier_produits'; // Nom de la table dans la base de données

    // Désactiver les timestamps si la table n'a pas de colonnes `created_at` et `updated_at`
    public $timestamps = false;

    protected $fillable = ['panier_id', 'produit_id', 'quantite']; // snake_case

    // Relation avec la table `Panier`
    public function panier() {
        return $this->belongsTo(Panier::class, 'Panier_id');
    }

    public function produit() {
        return $this->belongsTo(Produit::class, 'Produit_id');
    }
}
