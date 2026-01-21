@extends('admin.layouts.app')
@section('title', 'Tambah Kabar')
@section('content')
<h1 class="mb-6 text-2xl font-bold text-green-700">
    Tambah Kabar
</h1>

<form action="{{ route('admin.kabar.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-5">
    @csrf

    <input type="text" name="judul"
           class="w-full px-3 py-2 border rounded"
           placeholder="Judul kabar" required>

    <input type="file" name="gambar"
           class="w-full px-3 py-2 border rounded" required>

    <textarea name="isi" rows="6"
              class="w-full px-3 py-2 border rounded"
              placeholder="Isi kabar" required></textarea>

    <input type="text" name="kategori"
           class="w-full px-3 py-2 border rounded"
           placeholder="Kategori">

       <div class="mt-4">
    {{-- <label class="flex items-center gap-2 cursor-pointer">
        <input
            type="checkbox"
            name="is_popup"
            value="1"
            class="text-green-600 border-green-700 rounded focus:ring-green-500"
        >
        <span class="text-sm text-gray-700">
            Tampilkan sebagai popup di dashboard
        </span>
    </label> --}}
</div>

    <p class="italic text-red-600">* tanggal wajib diisi</p>
    <input type="date" name="tanggal_publish"
           class="w-64 px-3 py-2 border rounded" required>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active" checked>
        <span>Publikasikan</span>
    </label>

    <button class="px-6 py-2 text-white bg-green-700 rounded">
        Simpan
    </button>
</form>

@endsection
