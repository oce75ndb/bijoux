<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture commande #{{ $commande->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { color: #b77db5; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Facture – Commande #{{ $commande->id }}</h2>

    <p><strong>Client :</strong> {{ $commande->prenom }} {{ $commande->nom }}</p>
    <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y') }}</p>
    <p><strong>Adresse :</strong> {{ $commande->adresse }}, {{ $commande->code_postal }} {{ $commande->ville }}</p>

    <table>
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
                    <td>Produit #{{ $ligne->produit_id }}</td> {{-- Ou $ligne->produit->nom si tu veux plus de détails --}}
                    <td>{{ $ligne->quantite }}</td>
                    <td>{{ number_format($ligne->prix, 2) }} €</td>
                    <td>{{ number_format($ligne->prix * $ligne->quantite, 2) }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">Total : {{ number_format($commande->total, 2) }} €</h3>
</body>
</html>
