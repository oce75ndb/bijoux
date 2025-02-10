<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h1 class="text-3xl font-bold text-center text-brown dark:text-beige mb-6">Paiement sécurisé</h1>

        <!-- Message de succès -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                🎉 {{ session('success') }}
            </div>
        @endif

        <!-- Message d'erreur -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Résumé du panier -->
        <div class="bg-white dark:bg-brown shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-bold mb-4 text-brown dark:text-beige">Résumé de votre commande</h2>
            <ul class="space-y-3">
                @foreach(session('panier', []) as $article)
                    <li class="flex justify-between border-b pb-2">
                        <span class="text-brown dark:text-beige">{{ $article['nom'] }} x{{ $article['quantite'] }}</span>
                        <span class="font-semibold text-gold">{{ number_format($article['prix'] * $article['quantite'], 2) }} €</span>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4 text-right text-xl font-bold text-brown dark:text-beige">
                Total : <span class="text-gold">{{ number_format($article['prix'] * $article['quantite'], 2) }} €</span>
            </div>
        </div>

        <!-- Formulaire de paiement -->
        <form action="{{ route('checkout.process') }}" method="POST" class="bg-white dark:bg-brown shadow-md rounded-lg p-6">
            @csrf

            <!-- Informations personnelles -->
            <h2 class="text-xl font-bold mb-4 text-brown dark:text-beige">Informations de facturation</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nom complet -->
                <div>
                    <label for="name" class="block font-semibold text-brown dark:text-beige">Nom complet</label>
                    <input type="text" id="name" name="name" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block font-semibold text-brown dark:text-beige">Email</label>
                    <input type="email" id="email" name="email" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <!-- Pays -->
                <div>
                    <label for="pays" class="block font-semibold text-brown dark:text-beige">Pays</label>
                    <input type="text" id="pays" name="pays" required placeholder="France" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <!-- Ville -->
                <div>
                    <label for="ville" class="block font-semibold text-brown dark:text-beige">Ville</label>
                    <input type="text" id="ville" name="ville" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <!-- Code postal -->
                <div>
                    <label for="code_postal" class="block font-semibold text-brown dark:text-beige">Code postal</label>
                    <input type="text" id="code_postal" name="code_postal" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>
            </div>

            <!-- Détails de la carte bancaire -->
            <h2 class="text-xl font-bold mt-6 mb-4 text-brown dark:text-beige">Informations de paiement</h2>

            <div class="mb-4">
                <label for="carte" class="block font-semibold text-brown dark:text-beige">Numéro de carte (fictif)</label>
                <input type="text" id="carte" name="carte" placeholder="1234 5678 9012 3456" required 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Date d'expiration -->
                <div>
                    <label for="expiration" class="block font-semibold text-brown dark:text-beige">Date d'expiration</label>
                    <input type="text" id="expiration" name="expiration" placeholder="MM/YY" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <!-- Code CVV -->
                <div>
                    <label for="cvv" class="block font-semibold text-brown dark:text-beige">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="123" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
                </div>
            </div>

            <!-- Bouton de validation -->
            <button type="submit" class="w-full bg-gold text-white py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-brown transition mt-6">
                Valider et Payer
            </button>
        </form>
    </div>
</x-app-layout>
