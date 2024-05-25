<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="mb-5 text-xl font-light text-gray-800 dark:text-gray-200 sm:text-center">
            Ingrese a su cuenta
        </h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Tu Correo') }}
                </label>
                <x-input id="email" name="email" type="email" class="form-input block mt-1 w-full"
                    :value="old('email')" placeholder="Ex. james@bond.com" inputmode="email" required autofocus
                    autocomplete="username" />
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 text-xs font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Tu Contraseña') }}
                </label>
                <x-input id="password" name="password" type="password" class="form-input w-full" placeholder="••••••••"
                    required autocomplete="current-password" />
            </div>
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="form-checkbox" />
                    <span class="ml-2 text-xs font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                        {{ __('Recordarme') }}
                    </span>
                </label>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md">
                    {{ __('Iniciar Sesión') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>