<x-admin-layout title="Edit Galeri">

<h1 class="text-2xl font-bold mb-6 text-green-700">
    Edit Galeri
</h1>

<form action="{{ route('admin.galeri.update', $galeri->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-5">
    @csrf
    @method('PUT')

    <input type="text" name="judul"
           value="{{ $galeri->judul }}"
           class="w-full border rounded px-3 py-2" required>

    <textarea name="deskripsi" rows="3"
              class="w-full border rounded px-3 py-2">{{ $galeri->deskripsi }}</textarea>

    <input type="text" name="kategori"
           value="{{ $galeri->kategori }}"
           class="w-full border rounded px-3 py-2">

    <img src="{{ asset('storage/' . $galeri->gambar) }}"
         class="w-40 rounded">

    <input type="file" name="gambar"
           class="w-full border rounded px-3 py-2">

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active"
               {{ $galeri->is_active ? 'checked' : '' }}>
        <span>Aktifkan galeri</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Update
    </button>
</form>

</x-admin-layout>
