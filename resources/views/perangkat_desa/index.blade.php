<x-app-layout>
    <x-slot name="title">
        Dana Desa
    </x-slot>
<div class="p-6 mx-auto max-w-7xl">

    <h1 class="mt-24 mb-6 text-2xl font-bold text-center">Perangkat Desa</h1>

    @if($perangkat->isEmpty())
    <p class="text-center text-gray-500">Belum ada data perangkat desa.</p>
    @else
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
        @foreach($perangkat as $item)
        <div class="p-4 text-center bg-white rounded shadow">
            <div class="mb-4">
                @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                    class="object-cover w-24 h-24 mx-auto rounded-full">
                @else
                <div class="flex items-center justify-center w-24 h-24 mx-auto bg-gray-200 rounded-full">
                    <span class="text-gray-400">No Photo</span>
                </div>
                @endif
            </div>
            <h2 class="font-semibold">{{ $item->nama }}</h2>
            <p class="text-sm text-gray-600">{{ $item->jabatan }}</p>
        </div>
        @endforeach
    </div>
    @endif

</div>
</x-app-layout>