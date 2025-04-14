<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Affiche la page de paiement, uniquement pour les utilisateurs connectés.
     */
    public function index()
    {
        // Si l'utilisateur n'est pas connecté, rediriger vers la page d'inscription
        if (!Auth::check()) {
            return redirect()->route('register');
        }

        return view('checkout.index'); // Vue du panier avec le formulaire de paiement
    }

    /**
     * Traite le paiement simulé.
     */
    public function processPayment(Request $request)
    {
        // Validation des champs (à adapter si tu retires les champs carte)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'adresse' => 'required|string|max:255',
            'pays' => 'required|string',
            'ville' => 'required|string',
            'code_postal' => 'required|string|max:10',

        ]);

        return redirect()->route('checkout')->with('success', 'Paiement validé avec succès ! ✅');
    }
}
