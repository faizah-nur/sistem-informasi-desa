@extends('admin.layouts.app')

@section('content')
<h2 class="text-2xl font-bold text-green-700 mb-6">
    Tambah Pengumuman
</h2>

<form method="POST"
      action="{{ route('admin.pengumuman.store') }}"
      class="bg-white shadow rounded-lg p-6 space-y-5">

    @csrf

    <div>
        <label class="font-semibold text-green-700">Judul</label>
        <input type="text" name="judul" class="w-full border px-4 py-2 rounded mt-2">
    </div>

    <div>
        <label class="font-semibold text-green-700">Isi Lengkap</label>
        <textarea name="isi" rows="5"
                  class="w-full border px-4 py-2 rounded mt-2"></textarea>
    </div>

    <div>
        <label class="font-semibold text-green-700">Tanggal</label>
        <input type="date" name="tanggal"
               class="w-full border px-4 py-2 rounded mt-2">
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_published" value="1" checked>
        <label>Publish sekarang</label>
    </div>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Simpan
    </button>
</form>
@endsection
