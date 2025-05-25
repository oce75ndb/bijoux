# Océan de Bijoux

Océan de Bijoux est un site e-commerce fictif développé avec Laravel dans le cadre de mon BTS SIO SLAM. Il permet aux utilisateurs de découvrir des bijoux en ligne, de les ajouter à leur panier, de passer commande via PayPal et de suivre leurs achats depuis leur espace personnel. Le projet a pour objectif de reproduire un fonctionnement complet de boutique en ligne, de la navigation jusqu'à la validation du paiement.

## Technologies utilisées

- Laravel 11  
- Laravel Breeze (authentification, vérification email, réinitialisation du mot de passe)  
- Blade / Tailwind CSS pour l’affichage  
- MySQL (base de données relationnelle)  
- Javascript avec Ajax pour le panier  
- Intégration PayPal (paiement fictif uniquement côté redirection)

## Fonctionnalités principales

- Affichage des produits organisés par catégories dynamiques  
- Barre de recherche permettant de filtrer les produits par mots-clés  
- Page d’accueil avec sélection de produits récents  
- Ajout au panier sans rechargement de la page (AJAX)  
- Espace utilisateur sécurisé avec accès à l’historique de commandes  
- Formulaire de contact fonctionnel  
- Redirection vers PayPal après validation du panier (simulée)  
- Paiement uniquement disponible pour les utilisateurs connectés  
- Mots de passe sécurisés (8 caractères minimum, avec majuscule, minuscule et chiffre)

## Architecture du projet

### Contrôleurs principaux (`app/Http/Controllers`)

- `HomeController` : affichage de la page d'accueil  
- `ProduitController` : affichage des produits et des détails  
- `PanierController` : gestion du panier en AJAX  
- `CommandeController` : création des commandes et historique client  
- `CheckoutController` : redirection vers PayPal  
- `ContactController` : traitement des messages via formulaire

### Modèles (`app/Models`)

- `Produit`  
- `Categorie`  
- `Commande`  
- `Commandeligne`  
- `User`

### Vues (`resources/views`)

- Utilisation du composant `<x-app-layout>` sur toutes les pages principales  
- `home.blade.php`, `produits/index.blade.php`, `contact.blade.php`, `panier.blade.php`, etc.

## Base de données

La base de données suit une structure relationnelle classique :
- Un produit appartient à une catégorie  
- Une commande est liée à un utilisateur et contient plusieurs lignes de commande  
- Les clés étrangères sont utilisées pour assurer l'intégrité des données  

## Pistes d’amélioration

Certaines optimisations peuvent encore être envisagées pour aller plus loin :

- Intégrer un système de recherche ou de filtre dans les listes  
- Améliorer l'affichage des messages d’erreur ou de confirmation  
- Prévoir une pagination en cas de grand nombre de résultats  
- Amélioration du design graphique et de l’ergonomie générale
