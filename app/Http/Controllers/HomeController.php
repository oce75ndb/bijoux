<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;

class HomeController extends Controller
{
    public function index()
    {
        // Charger les produits avec les id 4, 15, et 25
        $produitA = Produit::find(4);
        $produitB = Produit::find(15);
        $produitC = Produit::find(25);

        // Récupère toutes les catégories pour le menu
        $categories = Categorie::all();

        // Envoyer les produits à la vue
        return view('home', compact('produitA', 'produitB', 'produitC', 'categories'));
        }
}
