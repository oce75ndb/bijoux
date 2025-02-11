<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h1 class="text-3xl font-bold text-center text-black dark:text-beige mb-6 animate-fade-in-up">
            Paiement sécurisé
        </h1>

        <!-- Message de succès -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded animate-fade-in-up">
                🎉 {{ session('success') }}
            </div>
        @endif

        <!-- Message d'erreur -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded animate-fade-in-up">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Résumé du panier -->
        <div class="bg-white dark:bg-brown shadow-lg rounded-lg p-6 mb-6 animate-fade-in-up">
            <h2 class="text-xl font-bold mb-4 text-black dark:text-beige">Résumé de votre commande</h2>
            <ul class="space-y-3">
                @php
                    $total = 0;
                @endphp
                @foreach(session('panier', []) as $article)
                    @php
                        $total += $article['prix'] * $article['quantite'];
                    @endphp
                    <li class="flex justify-between border-b pb-2">
                        <span class="text-black dark:text-beige">{{ $article['nom'] }} x{{ $article['quantite'] }}</span>
                        <span class="font-semibold text-gold">{{ number_format($article['prix'] * $article['quantite'], 2) }} €</span>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4 text-right text-xl font-bold text-black dark:text-beige">
                Total : <span class="text-gold">{{ number_format($total, 2) }} €</span>
            </div>
        </div>

        <!-- Formulaire de paiement -->
        <form action="{{ route('checkout.process') }}" method="POST" 
              class="bg-white dark:bg-brown shadow-lg rounded-lg p-6 animate-fade-in-up">
            @csrf

            <!-- Informations personnelles -->
            <h2 class="text-xl font-bold mb-4 text-black dark:text-beige">Informations de facturation</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block font-semibold text-black dark:text-beige">Nom complet</label>
                    <input type="text" id="name" name="name" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>

                <div>
                    <label for="email" class="block font-semibold text-black dark:text-beige">Email</label>
                    <input type="email" id="email" name="email" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div>
                    <label for="pays" class="block font-semibold text-black dark:text-beige">Pays</label>
                    <input type="text" id="pays" name="pays" required placeholder="France" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>

                <div>
                    <label for="ville" class="block font-semibold text-black dark:text-beige">Ville</label>
                    <input type="text" id="ville" name="ville" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>

                <div>
                    <label for="code_postal" class="block font-semibold text-black dark:text-beige">Code postal</label>
                    <input type="text" id="code_postal" name="code_postal" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>
            </div>

            <!-- Détails de la carte bancaire -->
            <h2 class="text-xl font-bold mt-6 mb-4 text-black dark:text-beige">Informations de paiement</h2>

            <div class="mb-4">
                <label for="carte" class="block font-semibold text-black dark:text-beige">Numéro de carte (fictif)</label>
                <input type="text" id="carte" name="carte" placeholder="1234 5678 9012 3456" required 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="expiration" class="block font-semibold text-black dark:text-beige">Date d'expiration</label>
                    <input type="text" id="expiration" name="expiration" placeholder="MM/YY" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>

                <div>
                    <label for="cvv" class="block font-semibold text-black dark:text-beige">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="123" required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>
            </div>

            <!-- Bouton de validation -->
            <button type="submit" 
                    class="w-full bg-gold text-white py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-black transition-transform transform hover:scale-105 active:scale-95 mt-6">
                Valider et Payer
            </button>
        </form>
    </div>
</x-app-layout>
