<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-700" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"
          class="p-6 transition-all duration-500 bg-white shadow-lg rounded-xl">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" value="Username"
                class="font-semibold text-green-700" />

            <x-text-input
                id="username"
                class="block w-full mt-1 border-green-300 focus:border-green-600 focus:ring-green-600"
                type="text"
                name="username"
                :value="old('username')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password"
                class="font-semibold text-green-700" />

            <x-text-input
                id="password"
                class="block w-full mt-1 border-green-300 focus:border-green-600 focus:ring-green-600"
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
                    class="text-green-600 border-green-300 rounded focus:ring-green-500"
                    name="remember">
                <span class="text-sm text-gray-600 ms-2">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        {{-- <div class="flex items-center justify-between mt-6">
            <div class="flex items-center gap-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-green-700 transition hover:text-green-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a class="text-sm text-green-700 transition hover:text-green-900"
                       href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            </div> --}}

            <x-primary-button
                class="transition-all duration-300 bg-green-700 hover:bg-green-800 focus:ring-green-500 hover:scale-105">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
