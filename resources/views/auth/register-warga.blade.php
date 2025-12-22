<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Warga</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex items-center justify-center">

<div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl p-8">
    
    <h2 class="text-2xl font-bold text-center text-gray-800">
        Registrasi Warga
    </h2>
    <p class="text-center text-gray-500 mb-6">
        Silakan lengkapi data sesuai KTP
    </p>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('warga.register.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- NIK --}}
<!-- NIK -->
<div class="mt-4">
    <x-input-label for="nik" value="NIK" />
    <x-text-input id="nik"
        class="block mt-1 w-full"
        type="text"
        name="nik"
        :value="old('nik')"
        required />
    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
</div>

            {{-- Nama --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Umur --}}
            <div>
                <label class="block text-sm font-medium">Umur</label>
                <input type="number" name="umur"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block text-sm font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="w-full mt-1 rounded-lg border-gray-300" required>
                    <option value="">Pilih</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>

                </select>
            </div>

            {{-- Alamat --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Alamat</label>
                <textarea name="alamat"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    rows="2" required></textarea>
            </div>

            {{-- Tempat Lahir --}}
            <div>
                <label class="block text-sm font-medium">Tempat Lahir</label>
                <input type="text" name="tempat_lahir"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label class="block text-sm font-medium">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Agama --}}
            <div>
                <label class="block text-sm font-medium">Agama</label>
                <input type="text" name="agama"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Pekerjaan --}}
            <div>
                <label class="block text-sm font-medium">Pekerjaan</label>
                <input type="text" name="pekerjaan"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm font-medium">No. HP</label>
                <input type="text" name="no_hp"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Status Nikah --}}
            <div>
                <label class="block text-sm font-medium">Status Pernikahan</label>
                <select name="status_pernikahan"
                    class="w-full mt-1 rounded-lg border-gray-300" required>
                    <option value="">Pilih</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai">Cerai</option>
                </select>
            </div>

            {{-- Email --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

            {{-- Password --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 rounded-lg border-gray-300"
                    required>
            </div>

        </div>

        <button type="submit"
            class="w-full mt-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600
                   text-white rounded-xl font-semibold hover:opacity-90 transition">
            Daftar Sekarang
        </button>

        <p class="text-center text-sm mt-4 text-gray-500">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-medium">
                Login di sini
            </a>
        </p>

    </form>

</div>

</body>
</html>
