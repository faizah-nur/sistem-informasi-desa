@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl p-6 mx-auto bg-white rounded shadow">

    <h1 class="mb-4 text-lg font-bold">
        Edit Realisasi Dana Desa
    </h1>

    <form action="{{ route('admin.dana-desa.update', $dana_desa_realisasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="text-sm">Tahun</label>
            <input type="number" name="tahun"
                   value="{{ old('tahun', $dana_desa_realisasi->tahun) }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan"
                   value="{{ old('nama_kegiatan', $dana_desa_realisasi->nama_kegiatan) }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Anggaran</label>
            <input type="number" name="anggaran"
                   value="{{ old('anggaran', $dana_desa_realisasi->anggaran) }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Dana Terealisasi</label>
            <input type="number" name="realisasi"
                   value="{{ old('realisasi', $dana_desa_realisasi->realisasi) }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Tanggal</label>
            <input type="date" name="tanggal"
                   value="{{ old('tanggal', $dana_desa_realisasi->tanggal ? $dana_desa_realisasi->tanggal->format('Y-m-d') : '') }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="text-sm">Keterangan</label>
            <textarea name="keterangan"
                      class="w-full px-3 py-2 border rounded">{{ old('keterangan', $dana_desa_realisasi->keterangan) }}</textarea>
        </div>

        <button class="px-4 py-2 text-white bg-blue-600 rounded">
            Update
        </button>
    </form>

</div>
@endsection
