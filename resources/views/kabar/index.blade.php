@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="title">
        Kabar Desa
    </x-slot>

    <!-- Hero Section Menu Kabar -->
    <section>
        <div class="hero md:relative md:h-screen md:px-16">
            <h1
                class="font-extrabold text-5xl md:text-9xl text-center text-green-700 mb-24 pt-16 tracking-widest">
                INFO <span class="text-amber-400">WARGA</span>
            </h1>

            <img
                class="absolute left-1/2 -translate-x-1/2 top-17 md:top-24 drop-shadow-2xl drop-shadow-green-700/25 md:max-w-md max-w-60"
                src="/img/npc.png"
                alt="hero"
            />

            <div class="content md:flex flex-col justify-center items-center px-5 md:mt-36 mt-52 relative z-50">
                <ul class="flex gap-10 pt-5">
                    <li><a href="" class="text-sky-600"><i data-feather="map-pin"></i></a></li>
                    <li><a href="" class="text-rose-500"><i data-feather="instagram"></i></a></li>
                    <li><a href="" class="text-amber-400"><i data-feather="mail"></i></a></li>
                    <li><a href="" class="text-green-400"><i data-feather="message-square"></i></a></li>
                </ul>

                <h1 class="text-4xl md:text-3xl font-bold mb-4 text-gray-600 tracking-widest">
                    <span class="text-sky-600">Kabar penting,</span>
                    <span class="text-rose-500">kegiatan,</span>
                    <span class="text-amber-400">dan pengumuman</span>
                    <span class="text-green-400"> resmi desa.</span>
                </h1>

                <!-- Search -->
                <form method="GET" class="mb-6 mt-20">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari kabar..."
                        class="w-full rounded-xl px-4 py-2 bg-green-100 text-lime-700"
                    />
                </form>
            </div>
        </div>
    </section>

    <!-- List Kabar -->
    <section class="max-w-5xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-semibold mb-6">Kabar Desa</h2>

        <!-- Filter Kategori -->
        <div class="flex gap-2 flex-wrap mb-8">
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
