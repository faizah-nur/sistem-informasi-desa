<x-admin-layout title="Edit Kabar">

<h1 class="text-2xl font-bold mb-6 text-green-700">
    Edit Kabar
</h1>

<form action="{{ route('admin.kabar.update', $kabar->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-5">
    @csrf
    @method('PUT')

    <input type="text" name="judul"
           value="{{ $kabar->judul }}"
           class="w-full border rounded px-3 py-2" required>

    <img src="{{ asset('storage/' . $kabar->gambar) }}"
         class="w-48 rounded">

    <input type="file" name="gambar"
           class="w-full border rounded px-3 py-2">

    <textarea name="isi" rows="6"
              class="w-full border rounded px-3 py-2" required>{{ $kabar->isi }}</textarea>

    <input type="text" name="kategori"
           value="{{ $kabar->kategori }}"
           class="w-full border rounded px-3 py-2">

    <input type="date" name="tanggal_publish"
           value="{{ $kabar->tanggal_publish }}"
           class="w-full border rounded px-3 py-2">

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active"
               {{ $kabar->is_active ? 'checked' : '' }}>
        <span>Publikasikan</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Update
    </button>
</form>

</x-admin-layout>
