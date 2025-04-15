<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="animate-fade-in-up">

            <!-- Prénom -->
            <div>
                <x-input-label for="prenom" :value="__('Prénom')" />
                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autocomplete="given-name" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>

            <!-- Nom -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Téléphone -->
            <div class="mt-4">
                <x-input-label for="telephone" :value="__('Téléphone')" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autocomplete="tel" />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>

            <!-- Adresse -->
            <div class="mt-4">
                <x-input-label for="adresse" :value="__('Adresse')" />
                <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autocomplete="street-address" />
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>

            <!-- Ville et Code postal -->
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="ville" :value="__('Ville')" />
                    <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required />
                    <x-input-error :messages="$errors->get('ville')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="code_postal" :value="__('Code postal')" />
                    <x-text-input id="code_postal" class="block mt-1 w-full" type="text" name="code_postal" :value="old('code_postal')" required />
                    <x-input-error :messages="$errors->get('code_postal')" class="mt-2" />
                </div>
            </div>

            <!-- Pays -->
            <div class="mt-4">
                <x-input-label for="pays" :value="__('Pays')" />
                <x-text-input id="pays" class="block mt-1 w-full" type="text" name="pays" :value="old('pays')" required />
                <x-input-error :messages="$errors->get('pays')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Déjà inscrit(e) ?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('S\'inscrire') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
