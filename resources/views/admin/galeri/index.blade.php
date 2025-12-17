<x-admin-layout title="Galeri Desa">

<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold text-green-700">Galeri Desa</h1>

    <a href="{{ route('admin.galeri.create') }}"
       class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
        + Tambah Galeri
    </a>
</div>

<table class="w-full border text-sm">
    <thead class="bg-green-100">
        <tr>
            <th class="border px-3 py-2">Gambar</th>
            <th class="border px-3 py-2">Judul</th>
            <th class="border px-3 py-2">Kategori</th>
            <th class="border px-3 py-2">Status</th>
            <th class="border px-3 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td class="border px-3 py-2">
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                         class="w-24 rounded">
                </td>
                <td class="border px-3 py-2">{{ $item->judul }}</td>
                <td class="border px-3 py-2">{{ $item->kategori ?? '-' }}</td>
                <td class="border px-3 py-2">
                    @if ($item->is_active)
                        <span class="text-green-600 font-semibold">Aktif</span>
                    @else
                        <span class="text-red-500">Nonaktif</span>
                    @endif
                </td>
                <td class="border px-3 py-2 flex gap-2">
                    <a href="{{ route('admin.galeri.edit', $item->id) }}"
                       class="text-blue-600">Edit</a>

                    <form action="{{ route('admin.galeri.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus data?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500">
                    Belum ada data galeri
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

</x-admin-layout>
