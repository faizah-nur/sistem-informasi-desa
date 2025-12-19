<x-admin-layout title="Edit Info">

<h1 class="text-2xl font-bold mb-6 text-green-700">Edit Info</h1>

<form action="{{ route('admin.info.update', $info->id) }}"
      method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    <input type="text" name="judul"
           value="{{ $info->judul }}"
           class="w-full border rounded px-3 py-2" required>

    <textarea name="ringkasan" rows="3"
              class="w-full border rounded px-3 py-2" required>{{ $info->ringkasan }}</textarea>

    <textarea name="isi" rows="6"
              class="w-full border rounded px-3 py-2" required>{{ $info->isi }}</textarea>

    <select name="label" class="w-full border rounded px-3 py-2">
        @foreach (['Jadwal','Urgent','Bantuan'] as $label)
            <option value="{{ $label }}"
                {{ $info->label == $label ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    <input type="date" name="tanggal_posting"
           value="{{ $info->tanggal_posting }}"
           class="w-full border rounded px-3 py-2">

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active"
               {{ $info->is_active ? 'checked' : '' }}>
        <span>Aktifkan info</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Update
    </button>
</form>

</x-admin-layout>
