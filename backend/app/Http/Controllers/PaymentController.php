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
        ]);
    
        try {
            $carte = Paymentcarte::with('user')->findOrFail($validated['carte_id']);
            
            if (!$carte->user || !filter_var($carte->user->email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Email utilisateur invalide");
            }
    
            $verificationCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    
            Mail::to($carte->user->email)
               ->send(new PaymentConfirmationMail($verificationCode));
    
            // Stocke le code ET l'ID de la carte pour la modale
            session()->put('verification_code', [
                'code' => $verificationCode,
                'expires' => now()->addMinutes(15),
                'carte_id' => $carte->id
            ]);
    
            return back()
                ->with('success', 'Code de confirmation envoyé à votre email. Confirmez votre code.');
    
        } catch (\Exception $e) {
            Log::error("Erreur envoi email: ".$e->getMessage());
            return back()->with('error', 'Erreur lors de l\'envoi du code');
        }
    }
    
    public function verifyCode(Request $request)
{
    $request->validate([
        'verification_code' => 'required|digits:6',
        'carte_id' => 'required|exists:paymentcarte,id'
    ]);

    $storedCode = session('verification_code');

    if (!$storedCode || now()->gt($storedCode['expires'])) {
        return redirect()->back()->with('error', 'Code expiré ! Veuillez recommencer.');
    }

    if ($request->verification_code !== $storedCode['code']) {
        return redirect()->back()->with('error', 'Code invalide. Veuillez réessayer.');
    }

    // Si code valide
    session()->forget('verification_code');
    return redirect()->back()->with('success', 'Paiement confirmé avec succès !');
}
}