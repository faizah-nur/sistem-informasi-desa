<x-app-layout>
    <x-slot name="title">
        Riwayat Pengajuan
    </x-slot>

    <x-slot name="header" class="my-20">
        <h2 class="font-semibold text-xl text-gray-800">
            Riwayat Pengajuan Surat
        </h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto px-4">

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- LIST PENGAJUAN --}}
        @forelse ($pengajuans as $p)
            <div class="mb-4 p-4 bg-white rounded-xl shadow">

                {{-- HEADER --}}
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-gray-800">
                            {{ $p->jenisSurat->nama }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            Diajukan: {{ $p->created_at->format('d M Y') }}
                        </p>

                        {{-- NOMOR SURAT (JIKA ADA) --}}
                        @if ($p->nomor_surat)
                            <p class="text-sm text-gray-600 mt-1">
                                Nomor Surat:
                                <span class="font-semibold">
                                    {{ $p->nomor_surat }}
                                </span>
                            </p>
                        @endif
                    </div>

                    {{-- STATUS --}}
                    <span class="
                        px-3 py-1 rounded-full text-sm font-medium
                        @if($p->status === 'pending') bg-yellow-100 text-yellow-700
                        @elseif($p->status === 'diproses') bg-blue-100 text-blue-700
                        @elseif($p->status === 'ditolak') bg-red-100 text-red-700
                        @else bg-green-100 text-green-700
                        @endif
                    ">
                        {{ ucfirst($p->status) }}
                    </span>
                </div>

                {{-- AKSI --}}
                <div class="mt-3 flex flex-wrap gap-3 items-center">

                    {{-- DETAIL --}}
                    <a href="{{ route('pengajuan.show', $p->id) }}"
                       class="text-blue-600 text-sm hover:underline">
                        Detail
                    </a>

                    {{-- PDF (HANYA JIKA SELESAI + ADA NOMOR SURAT) --}}
                    @if ($p->status === 'selesai' && $p->nomor_surat)
                        <a href="{{ route('pengajuan.pdf', $p->id) }}"
                           class="bg-green-600 text-white px-3 py-1 rounded text-sm">
                            Download PDF
                        </a>
                    @elseif ($p->status === 'selesai')
                        <span class="text-sm text-gray-400 italic">
                            Menunggu nomor surat
                        </span>
                    @endif

                    {{-- CATATAN ADMIN JIKA DITOLAK --}}
                    @if ($p->status === 'ditolak' && $p->catatan_admin)
                        <span class="text-red-600 text-sm">
                            Ditolak: {{ $p->catatan_admin }}
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="p-6 bg-white rounded shadow text-center text-gray-500">
                Belum ada pengajuan surat.
            </div>
        @endforelse

        {{-- PAGINATION --}}
        <div class="mt-6">
            {{ $pengajuans->links() }}
        </div>

    </div>
</x-app-layout>
