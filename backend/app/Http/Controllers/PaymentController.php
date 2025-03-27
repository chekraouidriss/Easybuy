<?php

namespace App\Http\Controllers;

use App\Models\Paymentcarte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        // Récupère les cartes de l'utilisateur connecté
        $cartes = Paymentcarte::where('users_id', Auth::id())->get();
        return view('buy', compact('cartes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'numcart' => 'required|numeric|unique:paymentcarte',
            'expiration_date' => 'required|string|regex:/^\d{2}\/\d{2}$/',
            'cvv' => 'required|numeric|digits:3',
        ]);

        // Convertir MM/YY en format de date valide
        $dateParts = explode('/', $request->expiration_date);
        $expirationDate = '20'.$dateParts[1].'-'.$dateParts[0].'-01';

        Paymentcarte::create([
            'nom' => $request->nom,
            'numcart' => $request->numcart,
            'ExpirationDate' => $expirationDate,
            'CVV' => $request->cvv,
            'users_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Carte ajoutée avec succès');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'carte_id' => 'required|exists:paymentcarte,id,users_id,'.Auth::id(),
            'verification_code' => 'required|string'
        ]);

        // Ici vous devriez:
        // 1. Vérifier le code de vérification
        // 2. Traiter le paiement
        // 3. Enregistrer la transaction

        return redirect()->back()
               ->with('success', 'Paiement confirmé avec succès');
    }
}