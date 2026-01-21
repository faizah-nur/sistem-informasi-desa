@extends('admin.layouts.app')

@section('content')
<h2 class="mb-3 text-2xl font-bold text-green-700">
    Tambah Pengumuman
</h2>

<form method="POST"
      action="{{ route('admin.pengumuman.store') }}"
      class="p-6 space-y-5 bg-white rounded-lg shadow">

    @csrf

    <div>
        <label class="font-semibold text-green-700">Judul</label>
        <input type="text" name="judul" class="w-full px-4 py-2 mt-2 border rounded">
    </div>

    <div>
        <label class="font-semibold text-green-700">Isi Lengkap</label>
        <textarea name="isi" rows="5"
                  class="w-full px-4 py-2 mt-2 border rounded"></textarea>
    </div>

    <div>
        <label class="font-semibold text-green-700">Tanggal</label>
        <input type="date" name="tanggal"
               class="w-full px-4 py-2 mt-2 border rounded">
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_published" value="1" checked>
        <label>Publish sekarang</label>
    </div>

    <button class="px-6 py-2 text-white bg-green-700 rounded">
        Simpan
    </button>
</form>
@endsection
