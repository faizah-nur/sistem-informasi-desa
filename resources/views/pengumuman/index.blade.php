<x-app-layout>
    <x-slot name="title">
        Pengumuman Desa
    </x-slot>

    <!-- HERO -->
    <section class="w-full py-16 px-6 md:px-12 flex flex-col md:flex-row items-center justify-center gap-8">
        <img class="max-w-52" src="/img/npc.png" alt="img">

        <div class="text-left max-w-xl">
            <h1 class="text-4xl md:text-5xl text-green-700 font-extrabold">
                Pengumuman Desa
            </h1>
            <p class="text-lg mt-4 text-amber-500">
                Informasi resmi dari pemerintah desa untuk seluruh warga.
            </p>
        </div>
    </section>

    <!-- LIST PENGUMUMAN -->
    <section class="max-w-5xl mx-auto px-6 md:px-12 mt-10 grid gap-6 pb-20">

        @forelse ($pengumuman as $item)
            <div
                class="p-5 bg-green-100 text-lime-700 rounded-xl shadow-[5px_5px_30px_rgba(0,255,0,0.35)]
                       hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition">

                <div class="flex justify-between items-start">
                    <h3 class="text-xl font-bold">
                        {{ $item->judul }}
                    </h3>

                    <span class="bg-green-200 text-green-800 text-xs px-3 py-1 rounded-full">
                        Pengumuman
                    </span>
                </div>

                <p class="text-gray-600 mt-2">
                    {{ $item->ringkasan }}
                </p>

                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-500">
                        Diposting:
                        {{ $item->tanggal->translatedFormat('d F Y') }}
                    </span>

                <a href="{{ route('pengumuman.show', $item->id) }}"
                    class="text-green-700 font-semibold hover:underline">
                    Lihat Detail
                </a>

                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">
                Tidak ada pengumuman tersedia
            </p>
        @endforelse

        <!-- PAGINATION -->
        <div class="mt-10">
            {{ $pengumuman->links() }}
        </div>
    </section>

    {{-- FOOTER --}}
    {{-- <x-footer /> --}}
</x-app-layout>
