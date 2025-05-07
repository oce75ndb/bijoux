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
Route::get('/page/{page}', function ($page) {
    $pages = [
        'cgv' => [
            'titre' => 'Conditions Générales de Vente',
            'contenu' => '<p>Les présentes conditions s’appliquent à toutes les ventes conclues sur le site Océan de Bijoux. Les produits demeurent la propriété du vendeur jusqu’au paiement complet du prix. Les prix sont indiqués en euros, toutes taxes comprises.</p>',
        ],
        'retours' => [
            'titre' => 'Retours et Remboursements',
            'contenu' => '<p>Vous disposez d’un délai de 14 jours après réception de votre commande pour demander un retour. Les frais de retour sont à la charge de l’acheteur. Le remboursement sera effectué sous 10 jours après validation de l’état des articles retournés.</p>',
        ],
        'mentions-legales' => [
            'titre' => 'Mentions Légales',
            'contenu' => '
                <p><strong>Éditeur :</strong> Océan de Bijoux</p>
                <p><strong>Siège social :</strong> 123 Rue de la Perle, 84000 Avignon</p>
                <p><strong>SIRET :</strong> 000 000 000 00000</p>
                <p><strong>Responsable de la publication :</strong> Océane [Bondon</p>
                <p><strong>Hébergement :</strong> o2switch, 222-224 Boulevard Gustave Flaubert, 63000 Clermont-Ferrand</p>
            ',
        ],
        'collaborations' => [
            'titre' => 'Collaborations',
            'contenu' => '<p>Vous êtes créateur, influenceur ou professionnel du secteur et souhaitez collaborer avec Océan de Bijoux ? Contactez-nous à contact@oceandebijoux.fr. Nous étudions chaque proposition avec attention.</p>',
        ],
        'nous-distribuer' => [
            'titre' => 'Nous distribuer',
            'contenu' => '<p>Vous êtes une boutique ou un concept store et souhaitez distribuer nos bijoux ? Écrivez-nous à contact@oceandebijoux.fr pour recevoir notre catalogue revendeur et nos conditions B2B.</p>',
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
