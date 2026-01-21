@extends('admin.layouts.app' )
@section('content')
@if (session('success'))
    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif

<h2 class="mb-6 text-2xl font-bold text-green-700">
    Visi Misi
</h2>

<div class="p-6 bg-white border-2 border-green-700 rounded-lg">
    @if ($data)
    <h4>Visi</h4>
        <p class="mb-2 text-gray-700">
            {{ $data->visi }}
        </p>
        <h4>Misi</h4>
        <p class="mb-4 text-gray-700">
            {{ $data->misi }}
        </p>
        <h4>Gambar</h4>
        @if ($data->gambar)
            <img src="{{ asset('storage/' . $data->gambar) }}"
                 class="w-48 mb-4 rounded">
        @endif

        <a href="{{ route('admin.visi_misi.edit') }}"
           class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            Edit Konten
        </a>
    @else
        <p class="text-gray-500">
            Data Visi Misi belum tersedia.
        </p>

        <a href="{{ route('admin.visi_misi.edit') }}"
           class="inline-block px-4 py-2 mt-4 text-white bg-green-600 rounded">
            Isi Konten
        </a>
    @endif
</div>
@endsection
