<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Riwayat Pengajuan Surat
        </h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto px-4">
        
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

@forelse ($pengajuans as $p)
    <a href="{{ route('pengajuan.show', $p->id) }}"
       class="block mb-4 p-4 bg-white rounded-xl shadow
              hover:shadow-lg hover:bg-gray-50 transition">

        <div class="flex justify-between items-center">
            
            <div>
                <h3 class="font-semibold text-gray-800">
                    {{ $p->jenisSurat->nama }}
                </h3>
                <p class="text-sm text-gray-500">
                    Diajukan: {{ $p->created_at->format('d M Y') }}
                </p>
            </div>

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
    </a>
@empty

            <div class="p-6 bg-white rounded shadow text-center text-gray-500">
                Belum ada pengajuan surat.
            </div>
        @endforelse

    </div>
</x-app-layout>
