<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class PanierController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $panier = session()->get('panier', []);

        $total = 0;
        foreach ($panier as $article) {
            $total += $article['prix'] * $article['quantite'];
        }

        return view('panier.index', compact('categories', 'panier', 'total'));
    }

    public function ajouter(Request $request)
    {
        $panier = session()->get('panier', []);
        $id = $request->id;

        if (isset($panier[$id])) {
            $panier[$id]['quantite'] += 1;
        } else {
            $produit = \App\Models\Produit::findOrFail($id);

            $panier[$id] = [
                'nom' => $produit->nom,
                'prix' => $produit->prix,
                'quantite' => 1,
                'image' => $produit->image,
            ];
        }

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

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('panier.index')->with('success', 'Article supprimé du panier !');
    }

    public function vider()
    {
        session()->forget('panier');
        return redirect()->route('panier.index')->with('success', 'Panier vidé avec succès !');
    }

    public function incrementer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            $panier[$id]['quantite'] += 1;
            session()->put('panier', $panier);
        }

        if (request()->ajax()) {
            return response()->json(['success' => true]);
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
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('panier.index')->with('success', 'Quantité diminuée !');
    }

    public function getPanierHtml()
    {
        $categories = Categorie::all();
        $panier = session('panier', []);
        $total = 0;
    
        foreach ($panier as $item) {
            $total += $item['prix'] * $item['quantite'];
        }
    
        // On retourne directement le HTML de la vue du panier
        return view('panier._contenu', compact('panier', 'total'))->render();
    }    
}
?>