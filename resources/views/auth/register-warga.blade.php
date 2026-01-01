<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Warga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-green-50 to-green-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8
            transition-all duration-500 hover:shadow-2xl">

    <!-- Judul -->
    <h2 class="text-2xl font-bold text-center text-green-800">
        Registrasi Warga
    </h2>
    <p class="text-center text-gray-600 mb-6">
        Masukkan NIK sesuai data kependudukan
    </p>

    <!-- Error -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="text-sm list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- NIK -->
        <div>
            <label class="block text-sm font-medium text-green-700">
                NIK
            </label>
            <input type="text" name="nik"
                class="w-full mt-1 rounded-lg border-green-300
                       focus:border-green-600 focus:ring-green-600"
                placeholder="Masukkan NIK"
                required>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-green-700">
                Email
            </label>
            <input type="email" name="email"
                class="w-full mt-1 rounded-lg border-green-300
                       focus:border-green-600 focus:ring-green-600"
                placeholder="email@email.com"
                required>
        </div>

        <!-- Password -->
        <div x-data="{ password: '' }">
            <label class="block text-sm font-medium text-green-700">
                Password Akun
            </label>

            <input type="password"
                   name="password"
                   x-model="password"
                   placeholder="Minimal 8 karakter"
                   class="w-full mt-1 rounded-lg border-green-300
                          focus:border-green-600 focus:ring-green-600"
                   required>

            <p class="text-xs mt-1"
               :class="password.length >= 8 ? 'text-green-600' : 'text-red-600'">
                Password minimal 8 karakter
            </p>

            <p class="text-xs text-gray-500 mt-1">
                Password ini digunakan untuk login ke sistem layanan desa,
                bukan password email Anda.
            </p>
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full py-2 bg-green-700 text-white rounded-lg
                   hover:bg-green-800 transition-all duration-300
                   hover:scale-[1.02]">
            Daftar
        </button>

        <!-- Login -->
        <p class="text-center text-sm mt-4 text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}"
               class="text-green-700 font-medium hover:underline">
                Login
            </a>
        </p>
    </form>

</div>

</body>
</html>
