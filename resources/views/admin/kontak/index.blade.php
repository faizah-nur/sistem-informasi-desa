@extends('admin.layouts.app')

@section('title', 'Kontak Desa')

@section('content')
    <h2 class="text-xl font-semibold">Pesan Kontak Masuk</h2>

    <div class="p-6 max-w-6xl mx-auto">
        <table class="w-full border rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesans as $p)
                <tr class="border-t {{ $p->is_read ? '' : 'bg-green-50' }}">
                    <td class="p-3">{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        {{ $p->is_read ? 'Dibaca' : 'Baru' }}
                    </td>
                    <td class="flex gap-2 mt-3">
                        <a href="{{ route('admin.kontak.show', $p) }}"
                           class="text-blue-600">Detail</a>

                        <form method="POST"
                              action="{{ route('admin.kontak.destroy', $p) }}">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
