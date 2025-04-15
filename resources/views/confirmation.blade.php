<x-app-layout>
    <div class="text-center py-20">
        <h1 class="text-3xl font-bold text-black dark:text-beige mb-4">🎉 Merci pour votre commande !</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300">Un email de confirmation vous a été envoyé. À bientôt !</p>
        <a href="{{ route('produits.index') }}" class="inline-block mt-6 bg-gold text-white px-6 py-3 rounded hover:bg-black transition">Retour à la boutique</a>
    </div>
</x-app-layout>
