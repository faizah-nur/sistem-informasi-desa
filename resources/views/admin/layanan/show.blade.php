@extends('admin.layouts.app')

@section('title', 'Detail Pengajuan')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    {{ $pengajuan->jenisSurat->nama }}
</h1>

{{-- ================= DATA PEMOHON ================= --}}
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <h3 class="font-semibold mb-3">Data Pemohon</h3>

    <p><b>Nama:</b> {{ $pengajuan->user->name }}</p>
    <p><b>Email:</b> {{ $pengajuan->user->email }}</p>
    <p>
        <b>Status:</b>
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

{{-- ================= FILE PENDUKUNG ================= --}}
@if ($pengajuan->files->count())
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <h3 class="font-semibold mb-4">File Pendukung</h3>

    <ul class="list-disc list-inside space-y-1">
        @foreach ($pengajuan->files as $file)
            <li>
                <a href="{{ asset('storage/' . $file->path) }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    {{ $file->nama_file }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endif

{{-- ================= DATA PENGAJUAN ================= --}}
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <h3 class="font-semibold mb-3">Data Pengajuan</h3>

    @forelse ($pengajuan->details as $d)
        <p>
            <b>{{ \Illuminate\Support\Str::headline($d->key) }}:</b>
            {{ $d->value }}
        </p>
    @empty
        <p class="text-gray-500 text-sm">Tidak ada data tambahan.</p>
    @endforelse
</div>

{{-- ================= UPDATE STATUS ================= --}}
@if($pengajuan->status !== 'selesai')
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <form method="POST" action="{{ route('admin.layanan.update', $pengajuan->id) }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="pending" @selected($pengajuan->status=='pending')>Pending</option>
                <option value="diproses" @selected($pengajuan->status=='diproses')>Diproses</option>
                <option value="ditolak" @selected($pengajuan->status=='ditolak')>Ditolak</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Catatan Admin</label>
            <textarea name="catatan_admin"
                      rows="4"
                      class="w-full border rounded px-3 py-2">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
        </div>

        <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            Simpan Perubahan
        </button>
    </form>
</div>
@endif

{{-- ================= SELESAIKAN SURAT ================= --}}
@if(!$pengajuan->nomor_surat && $pengajuan->status !== 'ditolak')
<form method="POST"
      action="{{ route('admin.pengajuan.selesai', $pengajuan->id) }}"
      class="mb-6">
    @csrf
    <button
        onclick="return confirm('Yakin ingin menyelesaikan & menerbitkan surat ini?')"
        class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
        Selesaikan & Generate Nomor Surat
    </button>
</form>
@endif

{{-- ================= CHAT PENGAJUAN ================= --}}
<div id="chat" class="bg-white p-6 rounded-xl shadow mb-6">
    <h3 class="font-semibold mb-4">Chat Pengajuan</h3>

    <div class="chat-box mb-4">
        @foreach ($pengajuan->messages as $msg)
            <div class="flex mb-2 {{ $msg->sender_role === 'admin' ? 'justify-end' : 'justify-start' }}">
                <div class="chat-bubble {{ $msg->sender_role === 'admin' ? 'chat-admin' : 'chat-warga' }}">
                    <small class="font-semibold">
                        {{ $msg->sender_role === 'admin' ? 'Admin' : 'Warga' }}
                    </small>
                    <div>{{ $msg->pesan }}</div>
                    <small class="opacity-70 text-xs">
                        {{ $msg->created_at->format('d M Y H:i') }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>

    {{-- FORM KIRIM PESAN ADMIN --}}
    <form action="{{ route('admin.pengajuan.message.store', $pengajuan->id) }}#chat" method="POST">
        @csrf
        <div class="flex gap-2">
            <input type="text"
                   name="pesan"
                   class="flex-1 border rounded px-3 py-2"
                   placeholder="Tulis pesan..."
                   required>
            <button class="bg-green-700 text-white px-4 rounded hover:bg-green-800">
                Kirim
            </button>
        </div>
    </form>
</div>

{{-- ================= EXPORT PDF ================= --}}
@if($pengajuan->status === 'selesai' && $pengajuan->nomor_surat)
<a href="{{ route('admin.layanan.pdf', $pengajuan->id) }}"
   target="_blank"
   class="inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
    Export PDF
</a>
@endif

@endsection
