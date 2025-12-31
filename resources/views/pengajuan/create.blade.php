<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Pengajuan {{ $jenisSurat->nama }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('pengajuan.store') }}"
              enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="jenis_surat_id" value="{{ $jenisSurat->id }}">

            {{-- ================= DATA WARGA (READ ONLY) ================= --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
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
                <textarea class="w-full border rounded px-3 py-2 bg-gray-100"
                          rows="3"
                          readonly>{{ auth()->user()->alamat }}</textarea>
            </div>

            <hr class="my-6">

            {{-- ================= DATA TAMBAHAN SURAT ================= --}}
            @foreach ($fields as $name => $label)
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">
                        {{ $label }}
                    </label>

                    <input type="text"
                           name="data[{{ $name }}]"
                           value="{{ old('data.' . $name) }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>
            @endforeach

            {{-- ================= FILE PENDUKUNG ================= --}}
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1">
                    File Pendukung (Opsional)
                </label>
                <input type="file"
                       name="files[]"
                       multiple
                       class="text-sm">
                <p class="text-xs text-gray-500 mt-1">
                    PDF / JPG / PNG (maks. 2MB)
                </p>
            </div>

            <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Kirim Pengajuan
            </button>
        </form>
    </div>
</x-app-layout>
