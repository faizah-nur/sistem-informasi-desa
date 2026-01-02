<x-app-layout>
    <x-slot name="title">
        Detail Kabar
    </x-slot>

    <x-slot name="header" class="my-20">
        <h2 class="  text-green-700 text-center text-3xl font-bold mb-2">
            {{ $kabar->judul }}
        </h2>
    </x-slot>
<section class="max-w-4xl mx-auto py-10 px-4">
    <img src="{{ asset('storage/' . $kabar->gambar) }}" class="rounded-xl mb-6">

    <h1 class=""></h1>

    <p class="text-gray-500 mb-6">
        {{ $kabar->tanggal_publish->translatedFormat('d F Y') }}
        | {{ $kabar->kategori }}
    </p>

    <article class="prose max-w-none">
        {!! $kabar->isi !!}
    </article>

    {{-- komentar --}}
    <hr class="my-10">

<h2 class="text-xl font-bold mb-4">
    Komentar ({{ $kabar->komentars->count() }})
</h2>

{{-- LIST KOMENTAR --}}
<div id="komentar-wrapper" class="space-y-4">
@forelse ($kabar->komentars as $komentar)
    <div class="bg-green-50 p-4 rounded-xl">
        <p class="font-semibold text-green-700">
            {{ $komentar->user->name }}
        </p>
        <p class="text-sm text-gray-500 mb-1">
            {{ $komentar->created_at->diffForHumans() }}
        </p>
        <p class="text-gray-700">
            {{ $komentar->isi }}
        </p>
    </div>
@empty
    <p class="text-gray-500">Belum ada komentar.</p>
@endforelse
</div>

{{-- FORM KOMENTAR --}}
@auth
<form action="{{ route('komentar.store', $kabar->id) }}"
      method="POST"
      class="mt-6">
    @csrf
    <textarea name="isi"
        rows="3"
        class="w-full rounded-xl border-gray-300 focus:ring-green-500"
        placeholder="Tulis komentar..."
        required></textarea>

    <button
        class="mt-3 bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
        Kirim Komentar
    </button>
</form>
@else
<p class="mt-4 text-gray-500">
    <a href="{{ route('login') }}" class="text-green-600 font-medium">
        Login
    </a> untuk menulis komentar.
</p>
@endauth

</section>
</x-app-layout>