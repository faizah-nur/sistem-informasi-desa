<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-700" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"
          class="bg-white p-6 rounded-xl shadow-lg shadow-green-300 transition-all duration-500">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email"
                class="text-green-700 font-semibold" />

            <x-text-input
                id="email"
                class="block mt-1 w-full border-green-300 focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password"
                class="text-green-700 font-semibold" />

            <x-text-input
                id="password"
                class="block mt-1 w-full border-green-300 focus:border-green-600 focus:ring-green-600"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-green-300 text-green-600 focus:ring-green-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <div class="flex items-center gap-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-green-700 hover:text-green-900 transition"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                @if (Route::has('register') && old('role', request('role')) !== 'admin')
                    <a class="text-sm text-green-700 hover:text-green-900 transition"
                       href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            </div>

            <x-primary-button
                class="bg-green-700 hover:bg-green-800 focus:ring-green-500 transition-all duration-300 hover:scale-105">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
