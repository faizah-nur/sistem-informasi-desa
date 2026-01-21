@extends('admin.layouts.app')

@section('content')
<div class="max-w-6xl p-6 mx-auto">

    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold">Daftar Perangkat Desa</h1>
        <a href="{{ route('admin.perangkat.create') }}"
           class="px-4 py-2 text-white bg-green-600 rounded">
           + Tambah Perangkat
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jabatan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="object-cover w-12 h-12 rounded">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $item->nama }}</td>
                    <td class="px-4 py-2">{{ $item->jabatan }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.perangkat.edit', $item->id) }}"
                           class="px-3 py-1 text-sm text-white bg-blue-600 rounded">
                           Edit
                        </a>

                        <form action="{{ route('admin.perangkat.destroy', $item->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus perangkat ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 text-sm text-white bg-red-600 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">
                        Belum ada data perangkat desa
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
