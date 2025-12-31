@extends('admin.layouts.app')

@section('title', 'Layanan Desa')

@section('content')

<h1 class="text-2xl font-bold mb-6">Pengajuan Surat</h1>

<table class="w-full bg-white rounded shadow text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3">Pemohon</th>
            <th class="p-3">Jenis Surat</th>
            <th class="p-3">Tanggal</th>
            <th class="p-3">Status</th>
            <th class="p-3">Nomor Surat</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengajuans as $p)
        <tr class="border-t">
            <td class="p-3">{{ $p->user->name }}</td>
            <td class="p-3">{{ $p->jenisSurat->nama }}</td>
            <td class="p-3">{{ $p->created_at->format('d M Y') }}</td>
            <td class="p-3">
                <span class="px-2 py-1 rounded text-xs
                    @if($p->status=='pending') bg-yellow-100 text-yellow-700
                    @elseif($p->status=='diproses') bg-blue-100 text-blue-700
                    @elseif($p->status=='ditolak') bg-red-100 text-red-700
                    @else bg-green-100 text-green-700 @endif">
                    {{ ucfirst($p->status) }}
                </span>
            </td>
            <td class="p-3">
                @if($p->nomor_surat)
                    <span class="text-green-700 font-semibold">
                        {{ $p->nomor_surat }}
                    </span>
                 @else
                    <span class="text-gray-400 italic">
                        Belum terbit
                    </span>
                @endif
            </td>

            <td class="p-3">
                <a href="{{ route('admin.layanan.show', $p->id) }}"
                   class="text-blue-600 hover:underline">
                    Detail
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $pengajuans->links() }}
</div>

@endsection
