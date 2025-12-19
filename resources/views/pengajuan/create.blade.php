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
