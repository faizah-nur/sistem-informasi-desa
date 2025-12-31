@extends('admin.layouts.app')

@section('title', 'Detail Pengajuan')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    {{ $pengajuan->jenisSurat->nama }}
</h1>

{{-- ================= DATA PEMOHON ================= --}}
<div class="bg-white p-6 rounded shadow mb-6">
    <h3 class="font-semibold mb-3">Data Pemohon</h3>

    <p><b>Nama:</b> {{ $pengajuan->user->name }}</p>
    <p><b>Email:</b> {{ $pengajuan->user->email }}</p>
    <p><b>Status:</b>
        <span class="font-semibold capitalize">
            {{ $pengajuan->status }}
        </span>
    </p>

    @if($pengajuan->nomor_surat)
        <p><b>Nomor Surat:</b> {{ $pengajuan->nomor_surat }}</p>
        <p><b>Tanggal Surat:</b>
            {{ $pengajuan->tanggal_surat?->translatedFormat('d F Y') }}
        </p>
    @endif
</div>

{{-- ================= DATA PENGAJUAN ================= --}}
<div class="bg-white p-6 rounded shadow mb-6">
    <h3 class="font-semibold mb-3">Data Pengajuan</h3>

    @forelse ($pengajuan->details as $d)
        <p>
            <b>{{ Str::headline($d->key) }}:</b>
            {{ $d->value }}
        </p>
    @empty
        <p class="text-gray-500 text-sm">Tidak ada data tambahan.</p>
    @endforelse
</div>

{{-- ================= UPDATE STATUS ================= --}}
<div class="bg-white p-6 rounded shadow mb-6">
    <form method="POST"
          action="{{ route('admin.layanan.update', $pengajuan->id) }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Status</label>
            <select name="status"
                    class="w-full border rounded px-3 py-2">
                <option value="pending" @selected($pengajuan->status=='pending')>
                    Pending
                </option>
                <option value="diproses" @selected($pengajuan->status=='diproses')>
                    Diproses
                </option>
                <option value="ditolak" @selected($pengajuan->status=='ditolak')>
                    Ditolak
                </option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Catatan Admin</label>
            <textarea name="catatan_admin"
                      class="w-full border rounded px-3 py-2"
                      rows="4">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
        </div>

        <div class="flex gap-2">
            <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                Simpan Perubahan
            </button>

            @if($pengajuan->status === 'selesai')
                <a href="{{ route('admin.layanan.pdf', $pengajuan->id) }}"
                   class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                   target="_blank">
                    Export PDF
                </a>
            @endif
        </div>
    </form>
</div>

{{-- ================= TOMBOL SELESAI ================= --}}
@if(!$pengajuan->nomor_surat && $pengajuan->status !== 'ditolak')
    <form method="POST"
          action="{{ route('admin.pengajuan.selesai', $pengajuan->id) }}">
        @csrf
        <button
            onclick="return confirm('Yakin ingin menyelesaikan & menerbitkan surat ini?')"
            class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
            Selesaikan & Generate Nomor Surat
        </button>
    </form>
@elseif($pengajuan->nomor_surat)
    <div class="text-green-700 font-semibold">
        Surat telah diterbitkan dengan nomor:
        {{ $pengajuan->nomor_surat }}
    </div>
@endif

@endsection
