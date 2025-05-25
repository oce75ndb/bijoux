# Océan de Bijoux

Océan de Bijoux est un site e-commerce fictif développé avec Laravel dans le cadre de mon BTS SIO SLAM. Il permet aux utilisateurs de découvrir des bijoux en ligne, de les ajouter à leur panier, de passer commande via PayPal et de suivre leurs achats depuis leur espace personnel. Le projet a été réalisé en autonomie et a pour objectif de reproduire un fonctionnement complet de boutique en ligne, de la navigation jusqu'à la validation du paiement.

## Technos utilisées

- Laravel 11  
- Laravel Breeze (authentification, vérification email, réinitialisation du mot de passe)  
- Blade / Tailwind CSS pour l’affichage  
- MySQL (base de données relationnelle)  
- Javascript avec Ajax pour le panier  
- Intégration PayPal (paiement fictif uniquement côté redirection)

## Fonctionnalités principales

- affichage des produits organisés par catégories dynamiques  
- barre de recherche permettant de filtrer les produits par mots-clés  
- page d’accueil avec sélection de produits récents ou aléatoires  
- panier dynamique avec gestion en Ajax (ajout, retrait, mise à jour de quantité sans rechargement)  
- validation des commandes via un bouton PayPal (redirection fonctionnelle mais sans test réel, faute de compte sandbox configuré)  
- envoi automatique d’un e-mail de confirmation de commande à l’adresse de l’utilisateur après la commande  
- affichage de l’historique des commandes dans l’espace client (accessible uniquement une fois connecté)  
- génération d’un récapitulatif de la commande téléchargeable en PDF  
- formulaire de contact avec enregistrement et traitement via contrôleur  
- navigation fluide avec mise en page responsive adaptée aux différents formats d’écran  

L’utilisateur doit impérativement être connecté pour accéder au processus de commande et à son historique personnel.

## Améliorations possibles

- afficher un message de confirmation après l’ajout au panier  
- proposer un tri des produits (ordre alphabétique, prix croissant ou décroissant)  
- afficher un message si aucun produit ne correspond à la recherche  
- afficher le nombre total d’articles dans le panier directement dans le header  
- limiter la quantité maximale d’un même produit dans le panier  
- ajouter une image par défaut si aucun visuel n’est renseigné  
- améliorer la mise en page du formulaire de contact pour le rendre plus lisible  
- afficher des messages d’erreur plus clairs dans les formulaires (ex : champ vide ou email incorrect)  
- ajouter une description courte dans la fiche produit en plus de la description complète  

## Structure simplifiée du projet

- routes/web.php  
- app/Http/Controllers/
  - HomeController  
  - ProduitController  
  - CategorieController  
  - PanierController  
  - CommandeController  
  - CheckoutController  
  - ContactController  
- resources/views/
  - home.blade.php  
  - contact.blade.php  
  - historique.blade.php  
  - facture.blade.php  
  - confirmation.blade.php  
  - composants partagés (layouts, messages, erreurs, etc.)

## Projet fictif

Projet réalisé dans le cadre du BTS SIO SLAM, en respectant les principes du framework Laravel, avec mise en place d'une architecture MVC, gestion des vues via Blade, routage structuré et utilisation des bonnes pratiques du développement web.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
