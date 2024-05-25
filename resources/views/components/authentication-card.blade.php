<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div>
        {{ $logo }}
    </div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
    <div class="flex items-center justify-end mt-4">
        <p class="mb-4 space-y-2 text-sm text-left text-gray-600 sm:text-center sm:space-y-0">
            @if (Route::currentRouteName() == 'login')
                <a class="w-full sm:w-auto text-sm text-indigo-600 hover:bg-gray-700 px-4 p-2 rounded-md"
                    href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                <a class="w-full sm:w-auto text-sm text-indigo-600 hover:bg-gray-700 px-4 p-2 rounded-md"
                    href="{{ route('register') }}">
                    {{ __('Crea una cuenta') }}
                </a>
            @elseif (Route::currentRouteName() == 'register')
                <a class="w-full sm:w-auto text-sm text-indigo-600 hover:bg-gray-700 px-4 p-2 rounded-md"
                    href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
            @endif
        </p>
    </div>
</div>