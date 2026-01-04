@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="title">
        Kabar Desa
    </x-slot>

    <!-- Hero Section Menu Kabar -->

    <!-- List Kabar -->
    <section class="max-w-5xl mx-auto py-10 px-4">
        <!-- Filter Kategori -->
        <div class="flex gap-2 flex-wrap mb-8 mt-24">
            <a href="{{ route('kabar.index') }}"
               class="px-4 py-2 rounded-full {{ request('kategori') ? 'bg-green-300' : 'bg-green-700 text-white' }}">
                Semua
            </a>

            @foreach ($kategori as $item)
                <a href="{{ route('kabar.index', ['kategori' => $item]) }}"
                   class="px-4 py-2 rounded-full {{ request('kategori') === $item ? 'bg-green-700 text-white' : 'bg-green-300' }}">
                    {{ $item }}
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($kabar as $item)
                <div class="bg-green-100 rounded-xl p-4 shadow-lg">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded-xl mb-3" />

                    <h3 class="font-semibold text-xl mb-1 text-lime-600">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-gray-500 text-sm mb-2">
                        Dipublikasikan:
                        {{ $item->tanggal_publish->translatedFormat('d F Y') }}
                    </p>

                    <p class="text-gray-700">
                        {{ Str::limit(strip_tags($item->isi), 120) }}
                    </p>

                    <a href="{{ route('kabar.show', $item->slug) }}"
                       class="text-green-700 font-medium mt-3 inline-block">
                        Baca selengkapnya →
                    </a>
                </div>
            @empty
                <p>Tidak ada kabar ditemukan</p>
            @endforelse
        </div>

        <div class="flex justify-center mt-10">
            {{ $kabar->links() }}
        </div>
    </section>

</x-app-layout>
