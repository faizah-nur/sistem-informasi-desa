<x-admin-layout>

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<h2 class="text-2xl font-bold text-green-700 mb-6">
    Tentang Desa
</h2>

<div class="bg-white shadow rounded-lg p-6">
    @if ($data)
        <h3 class="text-xl font-semibold mb-2">
            {{ $data->judul }}
        </h3>

        <p class="text-gray-700 mb-4">
            {{ $data->deskripsi }}
        </p>

        @if ($data->gambar)
            <img src="{{ asset('storage/' . $data->gambar) }}"
                 class="w-48 rounded mb-4">
        @endif

        <a href="{{ route('admin.tentang-desa.edit') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Edit Konten
        </a>
    @else
        <p class="text-gray-500">
            Data Tentang Desa belum tersedia.
        </p>

        <a href="{{ route('admin.tentang-desa.edit') }}"
           class="bg-green-600 text-white px-4 py-2 rounded mt-4 inline-block">
            Isi Konten
        </a>
    @endif
</div>

</x-admin-layout>
