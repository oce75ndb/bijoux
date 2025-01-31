<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-lg">
        <h1 class="text-3xl font-bold text-center text-black dark:text-beige mb-6">Paiement sécurisé</h1>

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

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                🎉 {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire de paiement -->
        <form action="{{ route('checkout.process') }}" method="POST" class="bg-white dark:bg-brown shadow-md rounded-lg p-6">
            @csrf

            <!-- Nom complet -->
            <div class="mb-4">
                <label for="name" class="block font-semibold text-black dark:text-beige">Nom complet</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-semibold text-black dark:text-beige">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <!-- Adresse -->
            <div class="mb-4">
                <label for="adresse" class="block font-semibold text-black dark:text-beige">Adresse de livraison</label>
                <input type="text" id="adresse" name="adresse" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <!-- Carte bancaire -->
            <div class="mb-4">
                <label for="carte" class="block font-semibold text-black dark:text-beige">Numéro de carte (fictif)</label>
                <input type="text" id="carte" name="carte" placeholder="1234 5678 9012 3456" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <!-- Bouton de validation -->
            <button type="submit" class="w-full bg-gold text-white py-3 rounded-lg text-lg font-semibold hover:bg-black transition">
                Valider le paiement
            </button>
        </form>
    </div>
</x-app-layout>
