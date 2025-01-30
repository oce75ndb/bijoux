<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CheckoutController;


// Route pour la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route pour afficher tous les produits avec filtres et recherche
Route::get('/products', [ProduitController::class, 'index'])->name('produits.index');

// Route pour afficher la catégorie d'un produit
Route::get('/products/categories/{id}', [CategorieController::class, 'getProduitsParCategorie'])->name('categorie.produits');

// Route pour afficher les détails d'un produit
Route::get('/products/{id}', [ProduitController::class, 'show'])->name('produit.show');

// Route pour afficher le panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');

// Route pour vider le panier
Route::post('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');

// Route pour ajouter un produit au panier
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');

// Route pour supprimer un produit du panier
Route::delete('/panier/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');

// Route pour le checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Route pour +1 au panier
Route::patch('/panier/incrementer/{id}', [PanierController::class, 'incrementer'])->name('panier.incrementer');

// Route pour -1 au panier
Route::patch('/panier/decrementer/{id}', [PanierController::class, 'decrementer'])->name('panier.decrementer');

// Route pour supprimer un par un les produits du panier
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
