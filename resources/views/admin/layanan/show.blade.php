@extends('admin.layouts.app')

@section('title', 'Detail Pengajuan')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    {{ $pengajuan->jenisSurat->nama }}
</h1>

<div class="bg-white p-6 rounded shadow mb-6">
    <p><b>Nama:</b> {{ $pengajuan->user->name }}</p>
    <p><b>Email:</b> {{ $pengajuan->user->email }}</p>
    <p><b>Status:</b> {{ ucfirst($pengajuan->status) }}</p>
</div>

<div class="bg-white p-6 rounded shadow mb-6">
    <h3 class="font-semibold mb-2">Data Pengajuan</h3>
    @foreach ($pengajuan->details as $d)
        <p><b>{{ ucfirst($d->key) }}:</b> {{ $d->value }}</p>
    @endforeach
</div>

<div class="bg-white p-6 rounded shadow">
    <form method="POST"
          action="{{ route('admin.layanan.update', $pengajuan->id) }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Status</label>
            <select name="status"
                    class="w-full border rounded px-3 py-2">
                <option value="pending" @selected($pengajuan->status=='pending')>Pending</option>
                <option value="diproses" @selected($pengajuan->status=='diproses')>Diproses</option>
                <option value="ditolak" @selected($pengajuan->status=='ditolak')>Ditolak</option>
                <option value="selesai" @selected($pengajuan->status=='selesai')>Selesai</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Catatan Admin</label>
            <textarea name="catatan_admin"
                      class="w-full border rounded px-3 py-2"
                      rows="4">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
        </div>
        <a href="{{ route('admin.layanan.pdf', $pengajuan->id) }}"
   class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
   target="_blank">
    Export PDF
</a>

        <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            Simpan Perubahan
        </button>
    </form>
</div>

@endsection
