<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'adresse',
        'ville',
        'code_postale',
        'telephone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Dans app/Models/User.php
    public function panier()
    {
        return $this->hasOne(Panier::class, 'users_id')->withCount(['produits as total_items' => function($query) {
            $query->select(DB::raw('SUM(quantite)'));
        }]);
    }
}
