@extends('admin.layouts.app', )

@section('title', 'Tambah Progress Pembangunan')
@section('content')

<h1 class="text-2xl font-bold mb-6 text-green-700">
    Tambah Progress Pembangunan
</h1>

<form action="{{ route('admin.progress-pembangunan.store') }}" method="POST" class="space-y-5">
    @csrf

    <div>
        <label class="font-semibold">Judul Kegiatan</label>
        <input type="text" name="judul_kegiatan"
               class="w-full border rounded px-3 py-2"
               value="{{ old('judul_kegiatan') }}" required>
    </div>

    <div>
        <label class="font-semibold">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
                  class="w-full border rounded px-3 py-2" required>{{ old('deskripsi') }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Persentase Progress (%)</label>
        <input type="number" name="persentase_progress"
               min="0" max="100"
               class="w-full border rounded px-3 py-2"
               value="{{ old('persentase_progress', 0) }}" required>
    </div>

    <div>
        <label class="font-semibold">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            <option value="perencanaan">Perencanaan</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai"
                   class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div class="flex gap-3">
        <button class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
            Simpan
        </button>

        <a href="{{ route('admin.progress-pembangunan.index') }}"
           class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
            Batal
        </a>
    </div>

</form>

@endsection
