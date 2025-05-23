<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Produit;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $styles = ['Classique', 'Moderne', 'Vintage', 'Minimaliste', 'Fantaisie'];
        $fabrications = ['Fabriqué à la main', 'Assemblage artisanal'];
        $dimensions = ['2cm x 2cm', '3cm x 3cm', '5cm x 5cm', '10cm x 2cm'];

        // Bagues
        Produit::create([
            'nom' => 'Bague Élégance Dorée',
            'slug' => 'bague-elegance-doree',
            'description' => 'Bague élégante principalement dorée, conçue pour toutes les occasions.',
            'prix' => 49.99,
            'image' => 'images/bagues/bague1.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Fine en Or',
            'slug' => 'bague-fine-en-or',
            'description' => 'Bague fine en or, idéale pour un style minimaliste.',
            'prix' => 59.99,
            'image' => 'images/bagues/bague2.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Solitaire Dorée',
            'slug' => 'bague-solitaire-doree',
            'description' => 'Bague solitaire avec un anneau doré élégant.',
            'prix' => 79.99,
            'image' => 'images/bagues/bague3.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Fantaisie Dorée',
            'slug' => 'bague-fantaisie-doree',
            'description' => 'Bague fantaisie dorée pour un style unique.',
            'prix' => 29.99,
            'image' => 'images/bagues/bague4.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague à Strass Dorée',
            'slug' => 'bague-a-strass-doree',
            'description' => 'Bague dorée ornée de strass scintillants.',
            'prix' => 34.99,
            'image' => 'images/bagues/bague5.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Tressée Dorée',
            'slug' => 'bague-tressee-doree',
            'description' => 'Bague avec un design tressé doré élégant.',
            'prix' => 44.99,
            'image' => 'images/bagues/bague6.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Vintage Dorée',
            'slug' => 'bague-vintage-doree',
            'description' => 'Bague au style vintage avec une finition dorée.',
            'prix' => 69.99,
            'image' => 'images/bagues/bague7.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Fleur Dorée',
            'slug' => 'bague-fleur-doree',
            'description' => 'Bague dorée avec un design floral raffiné.',
            'prix' => 39.99,
            'image' => 'images/bagues/bague8.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Minimaliste Dorée',
            'slug' => 'bague-minimaliste-doree',
            'description' => 'Bague minimaliste pour un style épuré.',
            'prix' => 24.99,
            'image' => 'images/bagues/bague9.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bague Royale Dorée',
            'slug' => 'bague-royale-doree',
            'description' => 'Bague dorée inspirée d\'un style royal.',
            'prix' => 99.99,
            'image' => 'images/bagues/bague10.jpg',
            'stock' => 5,
            'categorie_id' => 4,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);

        // Bracelets
        Produit::create([
            'nom' => 'Bracelet Jonc Doré',
            'slug' => 'bracelet-jonc-dore',
            'description' => 'Bracelet jonc principalement doré, raffiné et intemporel.',
            'prix' => 39.99,
            'image' => 'images/bracelets/bracelet1.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Chaîne Dorée',
            'slug' => 'bracelet-chaine-doree',
            'description' => 'Bracelet chaîne dorée, idéal pour un look chic et moderne.',
            'prix' => 44.99,
            'image' => 'images/bracelets/bracelet2.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Torsadé Doré',
            'slug' => 'bracelet-torsade-dore',
            'description' => 'Bracelet torsadé au fini doré brillant.',
            'prix' => 34.99,
            'image' => 'images/bracelets/bracelet3.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Perlé Doré',
            'slug' => 'bracelet-perle-dore',
            'description' => 'Bracelet perlé avec des accents dorés élégants.',
            'prix' => 49.99,
            'image' => 'images/bracelets/bracelet4.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Cœur Doré',
            'slug' => 'bracelet-coeur-dore',
            'description' => 'Bracelet doré avec un charm en forme de cœur.',
            'prix' => 29.99,
            'image' => 'images/bracelets/bracelet5.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Manchette Dorée',
            'slug' => 'bracelet-manchette-doree',
            'description' => 'Bracelet manchette audacieux avec une finition dorée.',
            'prix' => 69.99,
            'image' => 'images/bracelets/bracelet6.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Charme Doré',
            'slug' => 'bracelet-charme-dore',
            'description' => 'Bracelet avec plusieurs charms dorés.',
            'prix' => 54.99,
            'image' => 'images/bracelets/bracelet7.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Fantaisie Doré',
            'slug' => 'bracelet-fantaisie-dore',
            'description' => 'Bracelet fantaisie doré, idéal pour un look unique.',
            'prix' => 39.99,
            'image' => 'images/bracelets/bracelet8.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Fin Doré',
            'slug' => 'bracelet-fin-dore',
            'description' => 'Bracelet fin et délicat avec une finition dorée.',
            'prix' => 24.99,
            'image' => 'images/bracelets/bracelet9.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Bracelet Étoile Doré',
            'slug' => 'bracelet-etoile-dore',
            'description' => 'Bracelet doré avec un charm étoilé élégant.',
            'prix' => 44.99,
            'image' => 'images/bracelets/bracelet10.jpg',
            'stock' => 5,
            'categorie_id' => 2,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);

        // Colliers
        Produit::create([
            'nom' => 'Collier Pendentif Doré',
            'slug' => 'collier-pendentif-dore',
            'description' => 'Collier pendentif doré élégant, parfait pour compléter votre tenue.',
            'prix' => 69.99,
            'image' => 'images/colliers/collier1.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Chaîne Dorée',
            'slug' => 'collier-chaine-doree',
            'description' => 'Collier chaîne dorée pour un style classique et intemporel.',
            'prix' => 74.99,
            'image' => 'images/colliers/collier2.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Ras de Cou Doré',
            'slug' => 'collier-ras-de-cou-dore',
            'description' => 'Collier ras de cou principalement doré, élégant et discret.',
            'prix' => 39.99,
            'image' => 'images/colliers/collier3.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Fantaisie Doré',
            'slug' => 'collier-fantaisie-dore',
            'description' => 'Collier fantaisie doré, idéal pour ajouter une touche unique.',
            'prix' => 29.99,
            'image' => 'images/colliers/collier4.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Long Doré',
            'slug' => 'collier-long-dore',
            'description' => 'Collier long doré avec des accents élégants.',
            'prix' => 54.99,
            'image' => 'images/colliers/collier5.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Perlé Doré',
            'slug' => 'collier-perle-dore',
            'description' => 'Collier perlé doré avec des finitions brillantes.',
            'prix' => 64.99,
            'image' => 'images/colliers/collier6.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Fleur Doré',
            'slug' => 'collier-fleur-dore',
            'description' => 'Collier doré avec un pendentif floral raffiné.',
            'prix' => 44.99,
            'image' => 'images/colliers/collier7.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Médaillon Doré',
            'slug' => 'collier-medaillon-dore',
            'description' => 'Collier médaillon doré au style classique.',
            'prix' => 69.99,
            'image' => 'images/colliers/collier8.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Élégance Doré',
            'slug' => 'collier-elegance-dore',
            'description' => 'Collier doré conçu pour les grandes occasions.',
            'prix' => 99.99,
            'image' => 'images/colliers/collier9.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Collier Minimaliste Doré',
            'slug' => 'collier-minimaliste-dore',
            'description' => 'Collier doré au style minimaliste pour un look épuré.',
            'prix' => 24.99,
            'image' => 'images/colliers/collier10.jpg',
            'stock' => 5,
            'categorie_id' => 1,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);

        // Boucles d'Oreilles
        Produit::create([
            'nom' => 'Boucles Créoles Dorées',
            'slug' => 'boucles-creoles-dorees',
            'description' => 'Boucles créoles dorées élégantes pour toutes les occasions.',
            'prix' => 34.99,
            'image' => 'images/boucles/boucles1.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Pendantes Dorées',
            'slug' => 'boucles-pendantes-dorees',
            'description' => 'Boucles pendantes dorées avec des détails subtils.',
            'prix' => 44.99,
            'image' => 'images/boucles/boucles2.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Puces Dorées',
            'slug' => 'boucles-puces-dorees',
            'description' => 'Boucles puces dorées discrètes et élégantes.',
            'prix' => 24.99,
            'image' => 'images/boucles/boucles3.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Strass Dorées',
            'slug' => 'boucles-strass-dorees',
            'description' => 'Boucles dorées ornées de strass scintillants.',
            'prix' => 34.99,
            'image' => 'images/boucles/boucles4.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Fantaisie Dorées',
            'slug' => 'boucles-fantaisie-dorees',
            'description' => 'Boucles fantaisie dorées pour un look unique.',
            'prix' => 29.99,
            'image' => 'images/boucles/boucles5.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Classiques Dorées',
            'slug' => 'boucles-classiques-dorees',
            'description' => 'Boucles dorées classiques pour un style intemporel.',
            'prix' => 39.99,
            'image' => 'images/boucles/boucles6.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Torsadées Dorées',
            'slug' => 'boucles-torsadees-dorees',
            'description' => 'Boucles torsadées dorées élégantes et modernes.',
            'prix' => 34.99,
            'image' => 'images/boucles/boucles7.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Longues Dorées',
            'slug' => 'boucles-longues-dorees',
            'description' => 'Boucles longues dorées parfaites pour des occasions spéciales.',
            'prix' => 44.99,
            'image' => 'images/boucles/boucles8.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Discrètes Dorées',
            'slug' => 'boucles-discretes-dorees',
            'description' => 'Boucles dorées discrètes et élégantes.',
            'prix' => 19.99,
            'image' => 'images/boucles/boucles9.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
        Produit::create([
            'nom' => 'Boucles Élégance Dorées',
            'slug' => 'boucles-elegance-dorees',
            'description' => 'Boucles dorées élégantes pour sublimer votre look.',
            'prix' => 49.99,
            'image' => 'images/boucles/boucles10.jpg',
            'stock' => 5,
            'categorie_id' => 3,
            'materiau_id' => rand(1,4),
            'style_id' => rand(1,4),
            'dimensions' => $dimensions[array_rand($dimensions)],
            'fabrication_id' => rand(1,3),
        ]);
    }
}