<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin'; // Spécifie le nom de la table

    protected $fillable = [
        'Nom', // Colonne pour le nom de l'administrateur
        'Email', // Colonne pour l'email de l'administrateur
        'Motdepasse', // Colonne pour le mot de passe de l'administrateur (en texte brut)
    ];

    protected $hidden = [
        'Motdepasse', // Cache le mot de passe lors de la sérialisation
    ];

    // Méthode pour vérifier si un utilisateur est un administrateur
    public static function isAdmin($email, $password)
    {
        // Recherche l'administrateur par email
        $admin = self::where('Email', $email)->first();

        // Vérifie si l'administrateur existe et si le mot de passe correspond
        if ($admin && $admin->Motdepasse === $password) {
            return true;
        }

        return false;
    }}
