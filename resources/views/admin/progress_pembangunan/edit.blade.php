<x-admin-layout title="Edit Progress Pembangunan">

<h1 class="text-2xl font-bold mb-6 text-green-700">
    Edit Progress Pembangunan
</h1>

<form action="{{ route('admin.progress-pembangunan.update', $data->id) }}"
      method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    <div>
        <label class="font-semibold">Judul Kegiatan</label>
        <input type="text" name="judul_kegiatan"
               class="w-full border rounded px-3 py-2"
               value="{{ old('judul_kegiatan', $data->judul_kegiatan) }}" required>
    </div>

    <div>
        <label class="font-semibold">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
                  class="w-full border rounded px-3 py-2" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Persentase Progress (%)</label>
        <input type="number" name="persentase_progress"
               min="0" max="100"
               class="w-full border rounded px-3 py-2"
               value="{{ old('persentase_progress', $data->persentase_progress) }}" required>
    </div>

    <div>
        <label class="font-semibold">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            @foreach (['perencanaan', 'proses', 'selesai'] as $status)
                <option value="{{ $status }}"
                    {{ $data->status === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $data->tanggal_mulai }}">
        </div>

        <div>
            <label class="font-semibold">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $data->tanggal_selesai }}">
        </div>
    </div>

    <div class="flex gap-3">
        <button class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
            Update
        </button>

        <a href="{{ route('admin.progress-pembangunan.index') }}"
           class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
            Batal
        </a>
    </div>

</form>

</x-admin-layout>
