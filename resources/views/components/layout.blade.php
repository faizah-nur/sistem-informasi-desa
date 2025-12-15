<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Home' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <!-- Feather Icons CDN -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
      .layer {
        will-change: transform;
        transition: transform 0.05s linear;
      }
      /* pengumuman penting start */
      .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s ease;
      }
      .reveal.active {
        opacity: 1;
        transform: translateY(0);
      }
      /* pengumuman penting end */
    </style>
</head>
<body class="bg-white text-white overflow-x-hidden">
    {{-- navigasi --}}
  <x-nav-bar></x-nav-bar>
  {{-- header --}}
  <main>
    <div class="mx-auto px-4 py-6 sm:px-2 lg:px-0">
      {{$slot}}
    </div>
  </main>
  <x-footer>{{ $title }}</x-footer>

    {{-- place to push page-specific scripts --}}
    @stack('scripts')
</body>
</html>