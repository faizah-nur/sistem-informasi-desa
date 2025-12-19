<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Detail Pengajuan Surat
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8 px-4 space-y-6">

        {{-- Info Umum --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-semibold text-lg mb-2">
                {{ $pengajuan->jenisSurat->nama }}
            </h3>

            <p class="text-sm text-gray-500">
                Tanggal Pengajuan:
                {{ $pengajuan->created_at->format('d M Y H:i') }}
            </p>

            <p class="mt-2">
                Status:
                <span class="font-semibold">
                    {{ ucfirst($pengajuan->status) }}
                </span>
            </p>

            @if ($pengajuan->catatan_admin)
                <div class="mt-4 p-3 bg-red-50 text-red-700 rounded">
                    <strong>Catatan Admin:</strong><br>
                    {{ $pengajuan->catatan_admin }}
                </div>
            @endif
            @if ($pengajuan->status === 'pending')
    <form action="{{ route('pengajuan.batalkan', $pengajuan->id) }}"
          method="POST"
          onsubmit="return confirm('Yakin ingin membatalkan pengajuan ini?')"
          class="mt-4">
        @csrf
        @method('PATCH')

        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Batalkan Pengajuan
        </button>
    </form>
@endif

        </div>

        {{-- Data Form --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h4 class="font-semibold mb-4">Data Pengajuan</h4>

            <table class="w-full text-sm">
                @foreach ($pengajuan->details as $detail)
                    <tr class="border-b">
                        <td class="py-2 font-medium capitalize">
                            {{ str_replace('_', ' ', $detail->key) }}
                        </td>
                        <td class="py-2">
                            {{ $detail->value }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        {{-- File Pendukung --}}
        @if ($pengajuan->files->count())
            <div class="bg-white p-6 rounded-xl shadow">
                <h4 class="font-semibold mb-4">File Pendukung</h4>

                <ul class="list-disc list-inside">
                    @foreach ($pengajuan->files as $file)
                        <li>
                            <a href="{{ asset('storage/' . $file->path) }}"
                               target="_blank"
                               class="text-blue-600 underline">
                                {{ $file->nama_file }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('pengajuan.riwayat') }}"
           class="inline-block text-sm text-gray-600 underline">
            ← Kembali ke riwayat
        </a>

    </div>
</x-app-layout>
