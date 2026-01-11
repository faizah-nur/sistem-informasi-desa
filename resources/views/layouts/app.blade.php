<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white ">
<div class="min-h-screen bg-gray-100">

    @include('layouts.navigation')

    {{-- Page Heading (khusus x-app-layout) --}}
    @isset($header)
        <header class="bg-white shadow mb-3">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-20">
                {{ $header }}
            </div>
        </header>
    @endisset

@if (session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="fixed top-5 right-5 bg-green-600 text-white px-5 py-3 rounded-xl shadow-lg z-50"
    >
        {{ session('success') }}
    </div>
@endif


@auth
    @if(auth()->user()->role === 'admin')
        {{-- ADMIN PREVIEW --}}
    @endif
@endauth

@auth
@if(auth()->user()->role === 'admin')
    <div class="fixed top-16 z-50 bg-yellow-100/40 backdrop-blur-md border-b border-yellow-300 text-yellow-800 px-4 py-2 text-sm text-center">
        ⚠️ Kamu sedang melihat halaman sebagai <strong>ADMIN (Preview User View)</strong>
        <a href="{{ route('admin.dashboard') }}"
           class="underline font-medium ml-2">
            Kembali ke Dashboard Admin
        </a>
    </div>
@endif
@endauth


    {{-- Page Content --}}
    <main class="py-0">
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>

</div>
     <x-footer />

{{-- Stack scripts --}}
@stack('scripts')

<script src="{{ asset('js/script.js') }}" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

</body>
</html>
