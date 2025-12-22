<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Pengajuan {{ $jenisSurat->nama }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="jenis_surat_id" value="{{ $jenisSurat->id }}">
            {{-- DATA WARGA (AUTO) --}}
<div class="mb-4">
    <label class="block text-sm font-medium mb-1">Nama</label>
    <input type="text"
        class="w-full border rounded px-3 py-2 bg-gray-100"
        value="{{ auth()->user()->name }}"
        readonly>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">NIK</label>
    <input type="text"
        class="w-full border rounded px-3 py-2 bg-gray-100"
        value="{{ auth()->user()->nik }}"
        readonly>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">Alamat</label>
    <textarea
        class="w-full border rounded px-3 py-2 bg-gray-100"
        readonly>{{ auth()->user()->alamat }}</textarea>
</div>

            @foreach ($fields as $name => $label)
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">
                        {{ $label }}
                    </label>
                    <input
                        type="text"
                        name="data[{{ $name }}]"
                        class="w-full border rounded px-3 py-2"
                        required
                    >
                </div>
            @endforeach

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    File Pendukung
                </label>
                <input type="file" name="files[]" multiple>
            </div>

            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded"
            >
                Kirim Pengajuan
            </button>
        </form>
    </div>
</x-app-layout>
