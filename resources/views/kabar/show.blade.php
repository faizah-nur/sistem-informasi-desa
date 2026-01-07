<x-app-layout>
    <x-slot name="title">
        Detail Kabar
    </x-slot>

    <x-slot name="header">
        <h2 class="text-green-700 text-center text-3xl font-bold mb-2">
            {{ $kabar->judul }}
        </h2>
    </x-slot>

    <section class="max-w-4xl mx-auto py-10 px-4">

        {{-- Gambar Kabar --}}
        <img
            src="{{ asset('storage/' . $kabar->gambar) }}"
            class="rounded-xl mb-6 w-full object-cover"
        >

        {{-- Meta --}}
        <p class="text-gray-500 mb-6 text-sm text-center">
            {{ $kabar->tanggal_publish->translatedFormat('d F Y') }}
            • {{ $kabar->kategori }}
        </p>

        {{-- Isi Kabar --}}
        <article class="prose max-w-none mb-14">
            {!! $kabar->isi !!}
        </article>

        <hr class="my-10">

        <h2 class="text-2xl font-bold mb-6 text-green-700">
            Komentar ({{ $kabar->komentars->count() }})
        </h2>

        {{-- LIST KOMENTAR --}}
        <div id="komentar-wrapper" class="space-y-4">

            @forelse ($kabar->komentars as $komentar)
                <div
                    class="p-4 rounded-xl relative
                    {{ $komentar->user->isAdmin()
                        ? 'bg-green-100 border border-green-300'
                        : 'bg-gray-100' }}"
                >

                    <div class="flex items-center gap-2">
                        <p class="font-semibold text-green-800">
                            {{ $komentar->user->name }}
                        </p>

                        @if($komentar->user->isAdmin())
                            <span class="text-xs bg-green-600 text-white px-2 py-0.5 rounded-full">
                                Admin
                            </span>
                        @endif
                    </div>

                    <p class="text-xs text-gray-500 mb-2">
                        {{ $komentar->created_at->diffForHumans() }}
                    </p>

                    <p class="text-gray-700">
                        {{ $komentar->isi }}
                    </p>

                    {{-- ADMIN ONLY: HAPUS --}}
                    @auth
                        @if(auth()->user()->isAdmin())
                            <form
                                action="{{ route('admin.komentar.destroy', $komentar->id) }}"
                                method="POST"
                                class="absolute top-3 right-3"
                                onsubmit="return confirm('Hapus komentar ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="text-xs text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    @endauth

                </div>
            @empty
                <p class="text-gray-500">
                    Belum ada komentar.
                </p>
            @endforelse

        </div>

        {{-- FORM KOMENTAR --}}
        @auth
            <form
                action="{{ route('komentar.store', $kabar->id) }}"
                method="POST"
                class="mt-8"
            >
                @csrf

                <textarea
                    name="isi"
                    rows="3"
                    class="w-full rounded-xl border-gray-300 focus:ring-green-500"
                    placeholder="{{ auth()->user()->isAdmin()
                        ? 'Tulis komentar resmi sebagai Admin...'
                        : 'Tulis komentar...' }}"
                    required
                ></textarea>

                <button
                    class="mt-3 bg-green-600 text-white px-5 py-2 rounded-xl hover:bg-green-700 transition"
                >
                    Kirim Komentar
                </button>

                @if(auth()->user()->isAdmin())
                    <p class="mt-2 text-xs text-gray-500">
                        💡 Komentar Anda akan ditandai sebagai <strong>Admin</strong>
                    </p>
                @endif
            </form>
        @else
            <p class="mt-6 text-gray-500">
                <a href="{{ route('login') }}" class="text-green-600 font-medium">
                    Login
                </a>
                untuk menulis komentar.
            </p>
        @endauth

    </section>
</x-app-layout>
