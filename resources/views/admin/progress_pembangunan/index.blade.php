@extends('admin.layouts.app' )
@section('content')
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-green-700">Progress Pembangunan</h1>

        <a href="{{ route('admin.progress-pembangunan.create') }}"
           class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">
            + Tambah Kegiatan
        </a>
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full border-collapse">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Judul Kegiatan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Progress</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-4 py-3">
                            <p class="font-semibold">{{ $item->judul_kegiatan }}</p>
                            <p class="text-sm text-gray-500">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}
                            </p>
                        </td>

                        {{-- Status --}}
                        <td class="px-4 py-3">
                            @php
                                $statusColor = match($item->status) {
                                    'perencanaan' => 'bg-gray-200 text-gray-700',
                                    'proses' => 'bg-yellow-200 text-yellow-800',
                                    'selesai' => 'bg-green-200 text-green-800',
                                };
                            @endphp

                            <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColor }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>

                        {{-- Progress Bar --}}
                        <td class="px-4 py-3">
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div
                                    class="h-4 rounded-full text-xs text-white text-center
                                    {{ $item->status === 'selesai' ? 'bg-green-600' : 'bg-green-500' }}"
                                    style="width: {{ $item->persentase_progress }}%">
                                    {{ $item->persentase_progress }}%
                                </div>
                            </div>
                        </td>

                        {{-- Action --}}
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('admin.progress-pembangunan.edit', $item->id) }}"
                               class="inline-block  text-blue-600 hover:text-yellow-500">
                                Edit
                            </a>

                            <form action="{{ route('admin.progress-pembangunan.destroy', $item->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class=" text-red-600 rounded hover:text-red-400">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            Belum ada data progress pembangunan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
