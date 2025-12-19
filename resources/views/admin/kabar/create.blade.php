<x-admin-layout title="Tambah Kabar">

<h1 class="text-2xl font-bold mb-6 text-green-700">
    Tambah Kabar
</h1>

<form action="{{ route('admin.kabar.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-5">
    @csrf

    <input type="text" name="judul"
           class="w-full border rounded px-3 py-2"
           placeholder="Judul kabar" required>

    <input type="file" name="gambar"
           class="w-full border rounded px-3 py-2" required>

    <textarea name="isi" rows="6"
              class="w-full border rounded px-3 py-2"
              placeholder="Isi kabar" required></textarea>

    <input type="text" name="kategori"
           class="w-full border rounded px-3 py-2"
           placeholder="Kategori">

    <input type="date" name="tanggal_publish"
           class="w-full border rounded px-3 py-2" required>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active" checked>
        <span>Publikasikan</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Simpan
    </button>
</form>

</x-admin-layout>
