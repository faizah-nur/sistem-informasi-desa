<x-admin-layout>
<h2 class="text-2xl font-bold text-green-700 mb-6">
    Edit Tentang Desa
</h2>

<form method="POST"
      action="{{ route('admin.tentang-desa.update') }}"
      enctype="multipart/form-data"
      class="bg-white shadow rounded-lg p-6 space-y-5">

    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold text-green-700">Judul</label>
        <input type="text" name="judul"
               class="w-full border px-4 py-2 rounded mt-2"
               value="{{ old('judul', $data->judul ?? '') }}">
    </div>

    <div>
        <label class="block font-semibold text-green-700">Deskripsi</label>
        <textarea name="deskripsi" rows="5"
                  class="w-full border px-4 py-2 rounded mt-2">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
    </div>

    <div>
        <label class="block font-semibold text-green-700">Gambar</label>
        <input type="file" name="gambar"
               class="w-full border px-4 py-2 rounded mt-2">
    </div>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Simpan Perubahan
    </button>
</form>
</x-admin-layout>
