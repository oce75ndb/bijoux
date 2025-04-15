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
        <form method="POST" action="{{ route('checkout.process') }}" id="paypal-form" class="bg-white dark:bg-brown shadow-lg rounded-lg p-6 animate-fade-in-up">
            @csrf

            <!-- Informations personnelles -->
            <h2 class="text-xl font-bold mb-4 text-black dark:text-beige">Informations de facturation</h2>

            <p class="mb-4 text-sm text-gray-600">
                Connecté(e) en tant que <strong>{{ Auth::user()->prenom }} {{ Auth::user()->name }}</strong> ({{ Auth::user()->email }})
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="prenom" class="block font-semibold text-black dark:text-beige">Prénom</label>
                    <input type="text" id="prenom" name="prenom" required
                        value="{{ old('prenom', Auth::user()->prenom) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>

                <div>
                    <label for="name" class="block font-semibold text-black dark:text-beige">Nom</label>
                    <input type="text" id="name" name="name" required
                        value="{{ old('name', Auth::user()->name) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>
            </div>

            <div class="mt-4">
                <label for="adresse" class="block font-semibold text-black dark:text-beige">Adresse</label>
                <input type="text" id="adresse" name="adresse" required
                    value="{{ old('adresse', Auth::user()->adresse) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="ville" class="block font-semibold text-black dark:text-beige">Ville</label>
                    <input type="text" id="ville" name="ville" required
                        value="{{ old('ville', Auth::user()->ville) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>

                <div>
                    <label for="code_postal" class="block font-semibold text-black dark:text-beige">Code postal</label>
                    <input type="text" id="code_postal" name="code_postal" required
                        value="{{ old('code_postal', Auth::user()->code_postal) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold transition-all">
                </div>
            </div>


            <!-- Paiement via PayPal -->
            <h2 class="text-xl font-bold mt-6 mb-4 text-black dark:text-beige">Paiement via PayPal</h2>
            <div id="paypal-button-container" class="mt-4"></div>
        </form>

        <!-- Script PayPal -->
        <script src="https://www.paypal.com/sdk/js?client-id=AVQXOSVFFIJyUx5t-k19DcQOZDNkcBBiC5oyPbGyogSKO2SB0YivYVJpV-WGoybMwp5pA0TKYa1xaEkn&currency=EUR"></script>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ number_format($total, 2, '.', '') }}'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Merci ' + details.payer.name.given_name + '! Votre paiement a été effectué avec succès.');
                        window.location.href = "{{ route('checkout') }}";
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </div>
</x-app-layout>
