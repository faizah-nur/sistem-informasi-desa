<x-guest-layout>
    <form method="POST" action="{{ route('credentials.update') }}" class="bg-white p-6 rounded-xl shadow-lg">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="username" value="Username" />
            <x-text-input id="username" name="username" type="text" :value="old('username', auth()->user()->username)" required autofocus />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password baru" />
            <x-text-input id="password" name="password" type="password" required />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" required />
        </div>

        <div class="mt-4">
            <x-primary-button>Perbarui</x-primary-button>
        </div>
    </form>
</x-guest-layout>
