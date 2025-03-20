<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    // Nom de la table dans la base de données
    protected $table = 'Produits';

    
    protected $fillable = [
        'Nom',
        'Categorie',
        'Prix',
        'Description',
        'QntStock',
        'SrcImage',
    ];
}