<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use App\Models\Commandeligne;

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
        // 1. Validation des champs client
        $request->validate([
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
        ]);
    
        // 2. Calcul du total de la commande
        $total = 0;
        foreach (session('panier', []) as $article) {
            $total += $article['prix'] * $article['quantite'];
        }
    
        // 3. Création de la commande
        $commande = Commande::create([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('name'),
            'email' => $request->input('email'),
            'adresse' => $request->input('adresse'),
            'ville' => $request->input('ville'),
            'code_postal' => $request->input('code_postal'),
            'total' => $total,
        ]);
    
        // 4. Enregistrement des lignes de commande
        foreach (session('panier', []) as $article) {
            Commandeligne::create([
                'commande_id' => $commande->id,
                'produit_id' => $article['id'],
                'quantite' => $article['quantite'],
                'prix' => $article['prix'],
            ]);
        }
        
        session()->forget('panier');

        return redirect()->route('checkout')->with('success', 'Commande et articles enregistrée ! 🎉');
    }
}
