<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin Desa' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-green-700 text-white p-6 space-y-6">
        <h1 class="text-2xl font-bold">Admin Desa</h1>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block hover:bg-green-800 px-3 py-2 rounded">
                Dashboard
            </a>
            <a href="{{ route('admin.tentang-desa.index') }}" class="block hover:bg-green-800 px-3 py-2 rounded">
                Tentang Desa
            </a>
            <a href="{{ route('admin.pengumuman.index') }}" class="block hover:bg-green-800 px-3 py-2 rounded">
                Pengumuman
            </a>
            <a href="{{ route('admin.progress-pembangunan.index') }}" class="block hover:bg-green-800 px-3 py-2 rounded">
                Progres Pembangunan
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="block hover:bg-green-800 px-3 py-2 rounded">
                Galeri
            </a>
        </nav>

        <form method="POST" action="{{ route('admin_logout') }}">
            @csrf
            <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded mt-6">
                Logout
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">
        {{ $slot }}
    </main>

</div>

</body>
</html>
