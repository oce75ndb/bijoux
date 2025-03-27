<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Models\Produit;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produits', ProduitController::class . '@index');
// ->middleware('auth:sanctum');

// Routes ajoutées après appli

Route::get('/produits', function () {
    return Produit::all();
});

Route::put('/produits/{id}', function (Request $request, $id) {
    $produit = Produit::findOrFail($id);
    $produit->update([
        'stock' => $request->input('stock')
    ]);

    return response()->json(['message' => 'Stock mis à jour avec succès', 'produit' => $produit]);
});

Route::get('/commandes', function () {
    return \App\Models\Commande::with('produits')->get();
});