<x-app-layout>
    <div class="max-w-2xl mx-auto pt-24 pb-12 px-6 bg-beige rounded-2xl shadow-lg border border-gold dark:border-brown">
        <h2 class="text-3xl font-extrabold text-center mb-8 text-gold dark:text-brown tracking-wide">
            Contactez-nous
        </h2>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-300 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nom" class="block font-semibold text-brown mb-1">Nom</label>
                <input type="text" name="nom" id="nom" required
                    class="w-full border border-gold dark:border-brown bg-white rounded-lg px-4 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <div>
                <label for="email" class="block font-semibold text-brown mb-1">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full border border-gold dark:border-brown bg-white rounded-lg px-4 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            <div>
                <label for="message" class="block font-semibold text-brown mb-1">Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full border border-gold dark:border-brown bg-white rounded-lg px-4 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-gold"></textarea>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-semibold px-6 py-2 rounded-xl shadow-md transition duration-300">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
