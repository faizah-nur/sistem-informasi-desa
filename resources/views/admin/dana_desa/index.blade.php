@extends('admin.layouts.app')
@section('content') 
<div class="max-w-6xl p-6 mx-auto"> 
    <div class="flex items-center justify-between mb-4"> 
        <h1 class="text-xl font-bold">Realisasi Dana Desa</h1> 
        <a href="{{ route('admin.dana-desa.create') }}" class="px-4 py-2 text-white bg-green-600 rounded"> + Tambah Data </a> 
    </div> <div class="overflow-x-auto bg-white rounded shadow"> 
        <table class="w-full text-sm"> 
            <thead class="bg-gray-100"> 
                <tr> 
                    <th class="px-4 py-2">Kegiatan</th> 
                    <th class="px-4 py-2">Tahun</th> 
                    <th class="px-4 py-2">Anggaran</th> 
                    <th class="px-4 py-2">Realisasi</th> 
                    <th class="px-4 py-2">Tanggal</th> </tr> </thead>
<tbody>
    @forelse($data as $item)
    <tr class="border-t">
        <td class="px-4 py-2">{{ $item->nama_kegiatan }}</td>
        <td class="px-4 py-2 text-center">{{ $item->tahun }}</td>
        <td class="px-4 py-2">
            Rp {{ number_format($item->anggaran, 0, ',', '.') }}
        </td>
        <td class="px-4 py-2">
            Rp {{ number_format($item->realisasi, 0, ',', '.') }}
        </td>
        <td class="px-4 py-2">
            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
        </td>
        <td class="px-4 py-2">
            <a href="{{ route('admin.dana-desa.edit', $item->id) }}"
               class="px-3 py-1 text-sm text-white bg-blue-600 rounded">
               Edit
            </a>
        </td>
    </tr>
    @empty 
    <tr>
        <td colspan="6" class="py-4 text-center text-gray-500">
            Belum ada data
        </td>
    </tr>
    @endforelse
</tbody>
</table> 
</div> 
</div> 
@endsection