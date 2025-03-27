<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $table = 'Panier'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table

    // Désactiver les timestamps si la table n'a pas de colonnes `created_at` et `updated_at`
    public $timestamps = false;
    protected $fillable = [
        'users_id', // Ajoute cette ligne
    ];

    public function produits() {
        return $this->belongsToMany(Produit::class, 'panier_produits')
                    ->withPivot('quantite'); // snake_case
    }

    // Dans app/Models/Panier.php
    public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}
}
