<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture commande #{{ $commande->id }}</title>
    <style>
        @page {
            margin: 40px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #4a2e2a;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 40px;
        }

        h1, h2, h3 {
            color: #d6bfa8;
            margin-bottom: 5px; 
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 25px;
        }

        .produits-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .produits-table th, .produits-table td {
            border: 1px solid #d6bfa8;
            padding: 10px;
        }

        .produits-table th {
            background-color: #f4e3c1; /* Or doux */
            color: #4a2e2a;
            font-weight: 600;
            text-align: left;
        }


        .produits-table td:nth-child(2),
        .produits-table td:nth-child(3) {
            text-align: center;
        }

        .produits-table td:nth-child(4) {
            text-align: right;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 25px;
            color: #4a2e2a;
        }

        footer {
            position: fixed;
            bottom: 40px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Océan de Bijoux</h1>
            <h2>Facture n°{{ $commande->id }}</h2>
        </header>

        <div class="section">
            <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y') }}</p>
            <p><strong>Client :</strong> {{ $commande->user->prenom }} {{ $commande->user->nom }}</p>
            <p><strong>Adresse :</strong> {{ $commande->user->adresse }}, {{ $commande->user->code_postal }} {{ $commande->user->ville }}</p>
        </div>

        <table class="produits-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->lignes as $ligne)
                    <tr>
                        <td>{{ $ligne->produit->nom ?? 'Produit supprimé' }}</td>
                        <td>{{ $ligne->quantite }}</td>
                        <td>{{ number_format($ligne->prix_unitaire, 2, ',', ' ') }} €</td>
                        <td>{{ number_format($ligne->total, 2, ',', ' ') }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
            $totalReel = $commande->lignes->sum('total');
        @endphp

        <h3 class="total">Total réglé : {{ number_format($totalReel, 2, ',', ' ') }} €</h3>
    </div>

    <footer>
        &copy; {{ date('Y') }} Océan de Bijoux – www.oceandebijoux.fr<br>
        Merci pour votre commande ! Pour toute question : contact@oceandebijoux.fr
    </footer>

</body>
</html>
