@extends('admin.layouts.app')
@section('title', 'Tambah Galeri')
@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-700">
    Tambah Galeri
</h1>

<form action="{{ route('admin.galeri.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-5">
    @csrf

    <input type="text" name="judul" placeholder="Judul"
           class="w-full border rounded px-3 py-2" required>

    <textarea name="deskripsi" rows="3"
              class="w-full border rounded px-3 py-2"
              placeholder="Deskripsi (opsional)"></textarea>

    <input type="text" name="kategori" placeholder="Kategori"
           class="w-full border rounded px-3 py-2">

    <input type="file" name="gambar"
           class="w-full border rounded px-3 py-2" required>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active" checked>
        <span>Aktifkan galeri</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Simpan
    </button>
</form>

@endsection
