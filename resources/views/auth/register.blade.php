<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- NAMA --}}
        <div>
            <x-input-label value="Nama Lengkap" />
            <x-text-input class="block mt-1 w-full"
                type="text"
                name="name"
                required />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        {{-- NIK --}}
<div class="mt-4">
    <x-input-label for="nik" value="NIK" />
    <x-text-input id="nik" class="block mt-1 w-full"
        type="text" name="nik" required />
</div>

        {{-- EMAIL --}}
        <div class="mt-4">
            <x-input-label value="Email" />
            <x-text-input class="block mt-1 w-full"
                type="email"
                name="email"
                required />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        {{-- ALAMAT --}}
<div class="mt-4">
    <x-input-label for="alamat" value="Alamat" />
    <textarea name="alamat"
        class="block mt-1 w-full border rounded"></textarea>
</div>

        {{-- UMUR --}}
<div class="mt-4">
    <x-input-label for="umur" value="Umur" />
    <x-text-input id="umur" class="block mt-1 w-full"
        type="number" name="umur" required />
</div>

        {{-- AGAMA --}}
<div class="mt-4">
    <x-input-label for="agama" value="Agama" />
    <x-text-input id="agama" class="block mt-1 w-full"
        type="text" name="agama" required />
</div>

        {{-- STATUS NIKAH --}}
<div class="mt-4">
    <x-input-label for="nikah" value="Status Nikah" />
    <select name="nikah" class="block mt-1 w-full border rounded">
        <option value="Belum Menikah">Belum Menikah</option>
        <option value="Menikah">Menikah lah</option>
    </select>
</div>

        {{-- PASSWORD --}}
        <div class="mt-4">
            <x-input-label value="Password" />
            <x-text-input class="block mt-1 w-full"
                type="password"
                name="password"
                required />
        </div>

        {{-- CONFIRM --}}
        <div class="mt-4">
            <x-input-label value="Konfirmasi Password" />
            <x-text-input class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button>
                Daftar Warga
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
