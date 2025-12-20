@extends('admin.layouts.app')

@section('content')

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-green-700">
        Pengumuman Desa
    </h2>

    <a href="{{ route('admin.pengumuman.create') }}"
       class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
        + Tambah Pengumuman
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">Judul</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr class="border-t">
                <td class="p-3 font-semibold">{{ $item->judul }}</td>
                <td class="p-3">{{ $item->tanggal->format('d M Y') }}</td>
                <td class="p-3">
                    @if ($item->is_published)
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                            Published
                        </span>
                    @else
                        <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-sm">
                            Draft
                        </span>
                    @endif
                </td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                       class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('admin.pengumuman.destroy', $item->id) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline"
                                onclick="return confirm('Hapus pengumuman ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $data->links() }}
</div>

@endsection
