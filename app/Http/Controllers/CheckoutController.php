<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommandeValidée;
use App\Models\Commande;
use App\Models\Commandeligne;

class CheckoutController extends Controller
{
    /**
     * Affiche la page de paiement (utilisateur connecté obligatoire).
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        }

        return view('checkout.index');
    }

    /**
     * Traite le paiement simulé.
     */
    public function processPayment(Request $request)
    {
        // 1. Validation des champs
        $request->validate([
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
        ]);

        // 2. Calcul du total
        $total = 0;
        foreach (session('panier', []) as $article) {
            $total += $article['prix'] * $article['quantite'];
        }

        // 3. Création de la commande
        $commande = Commande::create([
            'user_id' => Auth::id(), // 🆕 lien avec l'utilisateur connecté
            'prenom' => $request->prenom,
            'nom' => $request->name,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'total' => $total,
        ]);

        // 4. Création des lignes de commande
        foreach (session('panier', []) as $article) {
            Commandeligne::create([
                'commande_id' => $commande->id,
                'produit_id' => $article['id'],
                'quantite' => $article['quantite'],
                'prix' => $article['prix'],
            ]);
        }

        // 5. Envoi de l'e-mail de confirmation
        Mail::to($commande->email)->send(new CommandeValidée($commande->prenom, $commande));

        // 6. Suppression du panier
        session()->forget('panier');

        // 7. Redirection
        return redirect()->route('confirmation')->with('success', 'Merci pour votre commande 💍🐚');
    }
}
