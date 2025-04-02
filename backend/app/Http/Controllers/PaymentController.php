<?php

namespace App\Http\Controllers;

use App\Models\Paymentcarte;
use App\Models\User; // Pour récupérer l'utilisateur
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentConfirmationMail;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Log; 


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
    $validated = $request->validate([
        'carte_id' => 'required|exists:paymentcarte,id',
        'verification_code' => 'sometimes|required'
    ]);

    try {
        // Récupérer la carte avec l'utilisateur associé
        $carte = Paymentcarte::with('user')->findOrFail($validated['carte_id']);
        
        // Vérifier que l'utilisateur existe et a un email valide
        if (!$carte->user || !filter_var($carte->user->email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email utilisateur invalide");
        }

        // Générer un code de vérification
        $verificationCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Envoyer l'email de confirmation
        Mail::to($carte->user->email)
           ->send(new PaymentConfirmationMail($verificationCode));

        // Stocker le code en session pour validation ultérieure
        session()->put('verification_code', [
            'code' => $verificationCode,
            'expires' => now()->addMinutes(15),
            'carte_id' => $carte->id
        ]);

        return back()->with('success', 'Code de confirmation envoyé à votre email');

    } catch (\Exception $e) {
        Log::error("Erreur envoi email: ".$e->getMessage());
        return back()->with('error', 'Erreur lors de l\'envoi du code de confirmation');
    }
}
    public function verifyCode(Request $request)
{
    $storedCode = session('verification_code');
    
    if (!$storedCode || now()->gt($storedCode['expires'])) {
        return back()->with('error', 'Code expiré ou invalide');
    }

    if ($request->input('code') !== $storedCode['code']) {
        return back()->with('error', 'Code incorrect');
    }

    // Code valide - procéder au paiement
    session()->forget('verification_code');
    
    return redirect()->route('payment.success')
                   ->with('success', 'Paiement confirmé!');
}
}