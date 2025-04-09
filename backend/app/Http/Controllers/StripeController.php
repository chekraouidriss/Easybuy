<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => ['name' => 'Commande EasyBuy'],
                    'unit_amount' => $request->amount * 100, // Stripe veut des centimes
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return response()->json(['url' => $session->url]);
    }

    public function success()
    {
        // Ici, tu peux appeler TA logique de confirmation existante
        return redirect()->route('buy')->with('success', 'Paiement Stripe réussi !');
    }

    public function cancel()
    {
        return redirect()->route('buy')->with('error', 'Paiement Stripe annulé.');
    }
}