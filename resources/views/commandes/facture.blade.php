<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture commande #{{ $commande->id }}</title>
    <style>
        @page { margin: 40px; }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #4a2e2a; /* Marron clair */
            background-color: #fffaf5; /* Beige doux */
        }

        h1, h2, h3 {
            color: #b77db5; /* Or rosé */
            margin-bottom: 5px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 20px;
        }

        .info-table, .produits-table {
            width: 100%;
            border-collapse: collapse;
        }

        .produits-table th, .produits-table td {
            border: 1px solid #e0cfcf;
            padding: 10px;
        }

        .produits-table th {
            background-color: #f5e6f5;
            color: #4a2e2a;
            font-weight: bold;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            color: #4a2e2a;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #888;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Océan de Bijoux</h1>
        <h2>Facture n°{{ $commande->id }}</h2>
    </header>

    <div class="section">
        <strong>Date :</strong> {{ $commande->created_at->format('d/m/Y') }}<br>
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

    <h3 style="margin-top: 20px;">Total réglé : {{ number_format($totalReel, 2, ',', ' ') }} €</h3>

    <footer>
        &copy; {{ date('Y') }} Océan de Bijoux – www.oceandebijoux.fr<br>
        Merci pour votre commande !<br>
        Pour toute question, contactez-nous à contact@oceandebijoux.fr
    </footer>

</body>
</html>
