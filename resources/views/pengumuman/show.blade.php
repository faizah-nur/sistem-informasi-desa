<x-app-layout>
    <x-slot name="title">
        Pengumuman Desa
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pengumuman
        </h2>
    </x-slot>

    <!-- HERO -->
    <section class="w-full py-14 px-6 md:px-12 bg-green-50">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-extrabold text-green-700">
                {{ $pengumuman->judul }}
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Diposting pada
                {{ $pengumuman->tanggal->translatedFormat('d F Y') }}
            </p>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="max-w-4xl mx-auto px-6 md:px-12 py-10">
        <article
            class="prose prose-green max-w-none bg-white p-6 rounded-xl shadow-lg">

            {!! nl2br(e($pengumuman->isi)) !!}

        </article>

        <!-- ACTION -->
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('pengumuman.index') }}"
               class="text-green-700 font-semibold hover:underline">
                ← Kembali ke Pengumuman
            </a>
        </div>
    </section>

    {{-- <x-footer /> --}}
</x-app-layout>
