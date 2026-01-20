@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl p-6 mx-auto bg-white rounded shadow">

    <h1 class="mb-4 text-lg font-bold">
        Tambah Realisasi Dana Desa
    </h1>

    <form action="{{ route('admin.dana-desa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="text-sm">Tahun</label>
            <input type="number" name="tahun"
                   value="{{ now()->year }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Anggaran</label>
            <input type="number" name="anggaran"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Dana Terealisasi</label>
            <input type="number" name="realisasi"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Tanggal</label>
            <input type="date" name="tanggal"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="text-sm">Keterangan</label>
            <textarea name="keterangan"
                      class="w-full px-3 py-2 border rounded"></textarea>
        </div>

        <button class="px-4 py-2 text-white bg-green-600 rounded">
            Simpan
        </button>
    </form>

</div>
@endsection
