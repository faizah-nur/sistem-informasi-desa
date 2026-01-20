<x-app-layout>
    <x-slot name="title">
        Kabar Desa
    </x-slot>

<div class="max-w-5xl px-4 py-6 mx-auto">

    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-green-800">
            Realisasi Dana Desa
        </h1>
        <p class="text-sm text-gray-600">
            Tahun Anggaran {{ $tahun }}
        </p>
    </div>

    {{-- Ringkasan --}}
    <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-3">
        <div class="p-4 text-center bg-white shadow rounded-xl">
            <p class="text-xs text-gray-500">Total Anggaran</p>
            <p class="font-bold text-green-700">
                Rp {{ number_format($totalAnggaran, 0, ',', '.') }}
            </p>
        </div>

        <div class="p-4 text-center bg-white shadow rounded-xl">
            <p class="text-xs text-gray-500">Total Terealisasi</p>
            <p class="font-bold text-amber-600">
                Rp {{ number_format($totalRealisasi, 0, ',', '.') }}
            </p>
        </div>

        <div class="p-4 text-center bg-white shadow rounded-xl">
            <p class="text-xs text-gray-500">Sisa Dana</p>
            <p class="font-bold text-red-600">
                Rp {{ number_format($totalAnggaran - $totalRealisasi, 0, ',', '.') }}
            </p>
        </div>
    </div>

    {{-- Tabel Realisasi --}}
    <div class="overflow-x-auto bg-white shadow rounded-xl">
        <table class="w-full text-sm">
            <thead class="text-gray-700 bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">Kegiatan</th>
                    <th class="px-4 py-3">Anggaran</th>
                    <th class="px-4 py-3">Terealisasi</th>
                    <th class="px-4 py-3">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($realisasi as $item)
                <tr class="border-t">
                    <td class="px-4 py-3">
                        <p class="font-medium">{{ $item->nama_kegiatan }}</p>
                        <p class="text-xs text-gray-500">
                            {{ $item->keterangan }}
                        </p>
                    </td>
                    <td class="px-4 py-3 text-center">
                        Rp {{ number_format($item->anggaran, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        Rp {{ number_format($item->realisasi, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3 text-center text-gray-600">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-500">
                        Belum ada data realisasi dana.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</x-app-layout>
