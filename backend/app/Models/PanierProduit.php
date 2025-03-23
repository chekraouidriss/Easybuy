<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierProduit extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'panier_produits'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table

    // Désactiver les timestamps si la table n'a pas de colonnes `created_at` et `updated_at`
    public $timestamps = false;

    // Relation avec la table `Panier`
    public function panier()
    {
        return $this->belongsTo(Panier::class, 'Panier_id', 'id');
    }

    // Relation avec la table `Produits`
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'Produit_id', 'id');
    }
}
