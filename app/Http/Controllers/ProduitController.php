<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    // Affiche tous les produits de la boutique avec filtres, recherche et pagination.
    public function index(Request $request)
    {
        // Récupère toutes les catégories pour le filtre
        $categories = Categorie::all();

        // Récupère les produits avec recherche et filtrage
        $produits = Produit::when($request->search, function ($query, $search) {
                    $query->where('nom', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%'); // Recherche aussi dans la description
                })
                ->when($request->categorie, function ($query, $categorie) {
                    $query->where('categorie_id', $categorie);
                })
                ->paginate(12) // Pagination avec 12 produits par page
                ->appends($request->all()); // Conserve les paramètres de recherche et de filtrage

        // Retourne la vue des produits avec les données
        return view('produits.index', compact('produits', 'categories'));
    }
    
    public function show($id)
    {
        // Récupère le produit par son ID ou échoue avec une erreur 404
        $produit = Produit::findOrFail($id);

        // Retourne la vue de détails du produit
        return view('produits.show', compact('produit'));
    }
}
