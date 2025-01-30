<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;

class CategorieController extends Controller
{
    /**
     * Affiche les produits d'une catégorie spécifique.
     */
    public function getProduitsParCategorie($id)
    {
        // Vérifie que la catégorie existe
        $categorie = Categorie::findOrFail($id);

        // Récupère les produits de la catégorie
        $produits = Produit::where('categorie_id', $id)->paginate(12);

        // Retourne la vue avec les données
        return view('produits.categories.index', compact('categorie', 'produits'));
    }
}
