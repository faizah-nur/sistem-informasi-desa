
@extends('admin.layouts.app' )
@section('content')
<h2 class="mb-6 text-2xl font-bold text-green-700">
    Edit Visi Misi Desa
</h2>

<form method="POST"
      action="{{ route('admin.visi_misi.update') }}"
      enctype="multipart/form-data"
      class="p-6 space-y-5 bg-white rounded-lg shadow">

    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold text-green-700">Visi</label>
        <textarea name="visi" rows="5"
                  class="w-full px-4 py-2 mt-2 border rounded">{{ old('visi', $data->visi ?? '') }}</textarea>
    </div>
    <div>
        <label class="block font-semibold text-green-700">Misi</label>
        <textarea name="misi" rows="5"
                  class="w-full px-4 py-2 mt-2 border rounded">{{ old('misi', $data->misi ?? '') }}</textarea>
    </div>

    <div>
        <label class="block font-semibold text-green-700">Gambar</label>
        <input type="file" name="gambar"
               class="w-full px-4 py-2 mt-2 border rounded">
    </div>

    <button class="px-6 py-2 text-white bg-green-700 rounded">
        Simpan Perubahan
    </button>
</form>
@endsection
