<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin Desa' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen p-6 space-y-6 overflow-scroll text-white bg-green-700">
        <h1 class="text-2xl font-bold">Admin Desa</h1>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Dashboard
            </a>
            <a href="{{ route('admin.dana-desa.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Dana Desa
            </a>
            <a href="{{ route('admin.tentang-desa.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Tentang Desa
            </a>
            <a href="{{ route('admin.pengumuman.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Pengumuman
            </a>
            <a href="{{ route('admin.progress-pembangunan.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Progres Pembangunan
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Galeri
            </a>
            <a href="{{ route('admin.kabar.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Kabar
            </a>
            <a href="{{ route('admin.layanan.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Layanan Desa
            </a>
            <a href="{{ route('admin.kontak.index') }}" class="block px-3 py-2 rounded hover:bg-green-800">
                Kontak
            </a>
        </nav>

        <form method="GET" action="{{ route('dashboard') }}">
            @csrf
            <button class="w-full py-2 mt-3 rounded bg-amber-500 hover:bg-amber-600">
                Lihat Halaman User
            </button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full py-2 mt-2 bg-red-600 rounded hover:bg-red-700">
                Logout
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
<main class="flex-1 h-screen p-8 overflow-scroll">
    @yield('content')
</main>

</div>

</body>
</html>
