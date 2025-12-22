<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Warga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center" >

<div class="w-full max-w-md bg-white rounded-xl shadow p-8">

    <h2 class="text-xl font-bold text-center">Registrasi Warga</h2>
    <p class="text-center text-gray-500 mb-6">
        Masukkan NIK sesuai data kependudukan
    </p>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="text-sm list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">

        @csrf

        {{-- NIK --}}
        <div class="mb-4">
            <label class="block text-sm font-medium">NIK</label>
            <input type="text" name="nik"
                class="w-full mt-1 rounded border-gray-300"
                required>
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email"
                class="w-full mt-1 rounded border-gray-300"
                required>
        </div>

{{-- Password --}}
<div class="md:col-span-2"
     x-data="{ password: '' }">

    <label class="block text-sm font-medium text-gray-700">
        Password Akun
    </label>

    <input type="password"
           name="password"
           x-model="password"
           placeholder="Minimal 8 karakter"
           class="w-full mt-1 rounded-lg border-gray-300"
           required>

    <!-- RULE TEXT -->
    <p class="text-xs mt-1"
       :class="password.length >= 8 ? 'text-green-600' : 'text-red-600'">
        Password minimal 8 karakter
    </p>

    <p class="text-xs text-gray-500 mt-1">
        Password ini digunakan untuk login ke sistem layanan desa,
        bukan password email Anda.
    </p>
</div>


        <button type="submit"
            class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Daftar
        </button>

        <p class="text-center text-sm mt-4 text-gray-500">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600">Login</a>
        </p>
    </form>

</div>

</body>
</html>
