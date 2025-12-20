@extends('admin.layouts.app')
@section('title', 'Info Desa')
@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold text-green-700">Info Desa</h1>

    <a href="{{ route('admin.info.create') }}"
       class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
        + Tambah Info
    </a>
</div>

<table class="w-full border text-sm">
    <thead class="bg-green-100">
        <tr>
            <th class="border px-3 py-2">Judul</th>
            <th class="border px-3 py-2">Label</th>
            <th class="border px-3 py-2">Tanggal</th>
            <th class="border px-3 py-2">Status</th>
            <th class="border px-3 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td class="border px-3 py-2">{{ $item->judul }}</td>
                <td class="border px-3 py-2">
                    <span class="px-2 py-1 rounded text-xs font-semibold
                        @if($item->label == 'Urgent') bg-red-100 text-red-600
                        @elseif($item->label == 'Bantuan') bg-blue-100 text-blue-600
                        @else bg-green-100 text-green-700 @endif">
                        {{ $item->label }}
                    </span>
                </td>
                <td class="border px-3 py-2">{{ $item->tanggal_posting }}</td>
                <td class="border px-3 py-2">
                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </td>
                <td class="border px-3 py-2 flex gap-2">
                    <a href="{{ route('admin.info.edit', $item->id) }}"
                       class="text-blue-600">Edit</a>

                    <form action="{{ route('admin.info.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus info ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500">
                    Belum ada info
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
