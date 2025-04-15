<x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 max-w-md mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg animate-fade-in-up" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div class="animate-slide-up">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full transition-all focus:ring-2 focus:ring-gold" 
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4 animate-slide-up delay-100">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full transition-all focus:ring-2 focus:ring-gold"
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 animate-slide-up delay-200">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 transition-all" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4 animate-slide-up delay-300">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-all"
                       href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3 transform transition-transform hover:scale-105 active:scale-95">
                    {{ __('Se connecter') }}
                </x-primary-button>
            </div>

            <div class="mt-6 text-center animate-slide-up delay-400">
                <span class="text-sm text-gray-600 dark:text-gray-400">Pas encore de compte ?</span>
                <a href="{{ route('register') }}" class="ml-2 text-sm text-gold hover:underline dark:text-gold/90">
                    S’inscrire
                </a>
            </div>
            
        </form>
</x-guest-layout>
