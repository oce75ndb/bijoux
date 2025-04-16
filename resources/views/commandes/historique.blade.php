<x-app-layout>
    <div class="max-w-4xl mx-auto pt-24 pb-12 px-6">
        <h2 class="text-3xl font-bold text-center text-gold mb-8">Mes commandes</h2>

        @if ($commandes->isEmpty())
            <p class="text-center text-brown">Vous n’avez encore passé aucune commande.</p>
        @else
            <div class="space-y-6">
                @foreach ($commandes as $commande)
                    <div class="bg-white shadow-md border border-gold rounded-lg p-6">
                        <h3 class="text-xl font-bold text-brown mb-2">
                            Commande n°{{ $commande->id }} – {{ $commande->created_at->format('d/m/Y') }}
                        </h3>
                        <p class="text-sm text-brown">Total : <strong>{{ number_format($commande->total, 2) }} €</strong></p>
                        <p class="text-sm text-brown">Adresse : {{ $commande->adresse }}, {{ $commande->code_postal }} {{ $commande->ville }}</p>

                        <div class="mt-4 text-right">
                            <a href="{{ route('commandes.facture', $commande->id) }}"
                               class="inline-block bg-gold text-white px-4 py-2 rounded hover:bg-brown transition duration-200">
                                📄 Télécharger la facture
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
