<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;

//Routes publiques (accès libre)

// Accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produits
Route::get('/products', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/products/categories/{id}', [CategorieController::class, 'getProduitsParCategorie'])->name('categorie.produits');
Route::get('/products/{id}', [ProduitController::class, 'show'])->name('produit.show');

// Panier (affichage)
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::get('/panier/html', [PanierController::class, 'getPanierHtml'])->name('panier.html');

// Panier (actions)
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::post('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');
Route::patch('/panier/incrementer/{id}', [PanierController::class, 'incrementer'])->name('panier.incrementer');
Route::patch('/panier/decrementer/{id}', [PanierController::class, 'decrementer'])->name('panier.decrementer');
Route::delete('/panier/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');

// Page de confirmation de commande
Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');



//Checkout (protégé par auth)

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processPayment'])->name('checkout.process');



//Espace utilisateur (authentification requise)

Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');
});



//Authentification (Breeze/Fortify)

require __DIR__.'/auth.php';
