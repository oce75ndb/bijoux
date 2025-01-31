<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // public function index()
    // {
    //     // Logique pour afficher la page de paiement
    //     return view('checkout.index');
    // }

    public function processPayment(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'adresse' => 'required|string',
            'carte' => 'required|digits:16', // Simule un numéro de carte à 16 chiffres
        ]);

        // Supposons que le paiement est toujours réussi
        return redirect()->route('checkout')->with('success', 'Paiement validé avec succès ! ✅');
    }
}
