<x-app-layout>
    <div class="max-w-xl mx-auto my-12 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6 text-pink-600">Contactez-nous</h2>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nom" class="block font-semibold">Nom</label>
                <input type="text" name="nom" id="nom" required class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input type="email" name="email" id="email" required class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label for="message" class="block font-semibold">Message</label>
                <textarea name="message" id="message" rows="4" required class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
