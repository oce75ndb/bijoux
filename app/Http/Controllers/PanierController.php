<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        // Récupérer le panier depuis la session
        $panier = session()->get('panier', []);

        // Calculer le montant total
        $total = 0;
        foreach ($panier as $article) {
            $total += $article['prix'] * $article['quantite'];
        }

        return view('panier.index', compact('panier', 'total'));
    }

    public function ajouter(Request $request)
    {
        // On récupère le panier depuis la session (ou un tableau vide s'il n'existe pas encore)
        $panier = session()->get('panier', []);

        // ID du produit
        $id = $request->id;

        // Vérifier si le produit existe déjà dans le panier
        if (isset($panier[$id])) {
            // Si oui, on incrémente la quantité
            $panier[$id]['quantite'] += 1;
        } else {
            // Sinon, on l'ajoute au panier
            $panier[$id] = [
                'nom' => $request->nom, // Nom du produit
                'prix' => $request->prix, // Prix du produit
                'quantite' => 1, // Quantité initiale
            ];
        }

        // On sauvegarde le panier dans la session
        session()->put('panier', $panier);

        return redirect()->route('panier.index')->with('success', 'Produit ajouté au panier !');
    }

    public function supprimer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        return redirect()->route('panier.index')->with('success', 'Article supprimé du panier !');
    }


    public function vider()
    {
        session()->forget('panier'); // Supprime le panier de la session

        return redirect()->route('panier.index')->with('success', 'Panier vidé avec succès !');
    }

    public function incrementer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            $panier[$id]['quantite'] += 1;
            session()->put('panier', $panier);
        }

        return redirect()->route('panier.index')->with('success', 'Quantité augmentée !');
    }

    public function decrementer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id]) && $panier[$id]['quantite'] > 1) {
            $panier[$id]['quantite'] -= 1;
            session()->put('panier', $panier);
        } elseif (isset($panier[$id])) {
            // Si la quantité est 1, supprime l'article
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        return redirect()->route('panier.index')->with('success', 'Quantité diminuée !');
    }

}
