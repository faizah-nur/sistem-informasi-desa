@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl p-6 mx-auto bg-white rounded shadow">
    <h1 class="mb-4 text-xl font-bold">Pengaturan Akun Admin</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.account.update') }}">
        @csrf
        @method('PUT')

        <!-- Username -->
        <div class="mb-4">
            <label class="block font-semibold">Username</label>
            <input type="text" name="username"
                   value="{{ old('username', $admin->username) }}"
                   class="w-full px-3 py-2 border rounded">
            @error('username')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password Lama -->
        <div class="mb-4">
            <label class="block font-semibold">Password Lama</label>
            <input type="password" name="current_password"
                   class="w-full px-3 py-2 border rounded">
            @error('current_password')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password Baru -->
        <div class="mb-4">
            <label class="block font-semibold">Password Baru</label>
            <input type="password" name="password"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <!-- Konfirmasi -->
        <div class="mb-4">
            <label class="block font-semibold">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <button class="px-4 py-2 text-white bg-green-600 rounded">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
