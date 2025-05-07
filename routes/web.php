<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommandeController;


/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produits
Route::get('/products', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/products/categories/{id}', [CategorieController::class, 'getProduitsParCategorie'])->name('categorie.produits');
Route::get('/products/{id}', [ProduitController::class, 'show'])->name('produit.show');

// Panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::put('/panier', [PanierController::class, 'index']);
Route::get('/panier/html', [PanierController::class, 'getPanierHtml'])->name('panier.html');
Route::post('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::delete('/panier/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::put('/panier/incrementer/{id}', [PanierController::class, 'incrementer'])->name('panier.incrementer');
Route::put('/panier/decrementer/{id}', [PanierController::class, 'decrementer'])->name('panier.decrementer');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processPayment'])->name('checkout.process');

// Commandes
Route::get('/mes-commandes', [CommandeController::class, 'historique'])
->middleware(['auth'])->name('commandes.historique');
Route::get('/commande/{id}/facture', [CommandeController::class, 'facture'])
->middleware(['auth'])->name('commandes.facture');


// Confirmation
Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');

// Dashboard
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Pages statiques
Route::get('/{page}', function ($page) {
    $pages = [
        'cgv' => [
            'titre' => 'Conditions Générales de Vente',
            'contenu' => '<p>Insère ici les CGV complètes...</p>',
        ],
        'retours' => [
            'titre' => 'Retours et Remboursements',
            'contenu' => '<p>Politique de retour : 14 jours après réception...</p>',
        ],
        'mentions-legales' => [
            'titre' => 'Mentions légales',
            'contenu' => '<p>Entreprise : Océan de Bijoux - SIRET 00000000000000...</p>',
        ],
        'nous-ecrire' => [
            'titre' => 'Nous écrire',
            'contenu' => '<p>Contacte-nous à contact@oceandebijoux.fr ou via le formulaire.</p>',
        ],
        'collaborations' => [
            'titre' => 'Collaborations',
            'contenu' => '<p>Tu veux collaborer avec nous ? Voici comment...</p>',
        ],
        'nous-distribuer' => [
            'titre' => 'Nous distribuer',
            'contenu' => '<p>Tu veux devenir revendeur ? Contacte-nous ici...</p>',
        ],
    ];

    if (!array_key_exists($page, $pages)) {
        abort(404);
    }

    return view('static', $pages[$page]);
})->name('page.static');

/*
|--------------------------------------------------------------------------
| Routes protégées (auth)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->middleware('verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Authentification (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
