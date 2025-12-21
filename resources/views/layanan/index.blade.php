<x-app-layout>
    <x-slot name="title">
        Layanan Desa
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Layanan Desa
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @foreach ($jenisSurats as $surat)
                <a href="{{ route('pengajuan.create', $surat->slug) }}"
                   class="block bg-white rounded-xl shadow hover:shadow-lg transition p-6">

                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $surat->nama }}
                    </h3>

                    <p class="text-sm text-gray-600 mt-2">
                        {{ $surat->deskripsi }}
                    </p>

                    <span class="inline-block mt-4 text-sm text-green-600 font-medium">
                        Ajukan →
                    </span>
                </a>
            @endforeach

        </div>
    </div>
</x-app-layout>
