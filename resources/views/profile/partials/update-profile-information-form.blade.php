<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Information du profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Mettez à jour les informations de profil et l'adresse e-mail de votre compte.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
    
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name', $user->name)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
    
        <div>
            <x-input-label for="prenom" :value="__('Prénom')" />
            <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full"
                          :value="old('prenom', $user->prenom)" required autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
        </div>
    
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
    
        <div>
            <x-input-label for="telephone" :value="__('Téléphone')" />
            <x-text-input id="telephone" name="telephone" type="tel" class="mt-1 block w-full"
                          :value="old('telephone', $user->telephone)" autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>
    
        <div>
            <x-input-label for="adresse" :value="__('Adresse')" />
            <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full"
                          :value="old('adresse', $user->adresse)" autocomplete="street-address" />
            <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
        </div>
    
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <x-input-label for="code_postal" :value="__('Code postal')" />
                <x-text-input id="code_postal" name="code_postal" type="text" class="mt-1 block w-full"
                              :value="old('code_postal', $user->code_postal)" />
                <x-input-error class="mt-2" :messages="$errors->get('code_postal')" />
            </div>
    
            <div>
                <x-input-label for="ville" :value="__('Ville')" />
                <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full"
                              :value="old('ville', $user->ville)" />
                <x-input-error class="mt-2" :messages="$errors->get('ville')" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label for="region">Région</label>
                <input id="region" name="region" type="text" class="mt-1 block w-full"
                    value="{{ old('region', $user->region) }}">
            </div>

            <div>
                <x-input-label for="pays" :value="__('Pays')" />
                <x-text-input id="pays" name="pays" type="text" class="mt-1 block w-full"
                              :value="old('pays', $user->pays)" />
                <x-input-error class="mt-2" :messages="$errors->get('pays')" />
            </div>
        </div>
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
    
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Sauvegardé.') }}
                </p>
            @endif
        </div>
    </form>    
</section>
