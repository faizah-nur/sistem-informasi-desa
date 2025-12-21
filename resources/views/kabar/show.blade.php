<section class="max-w-4xl mx-auto py-10 px-4">
    <img src="{{ asset('storage/' . $kabar->gambar) }}" class="rounded-xl mb-6">

    <h1 class="text-3xl font-bold mb-2">{{ $kabar->judul }}</h1>

    <p class="text-gray-500 mb-6">
        {{ $kabar->tanggal_publish->translatedFormat('d F Y') }}
        | {{ $kabar->kategori }}
    </p>

    <article class="prose max-w-none">
        {!! $kabar->isi !!}
    </article>
</section>
