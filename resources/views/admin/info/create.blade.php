@extends('admin.layouts.app')
@section('title', 'Tambah Info')
@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-700">Tambah Info</h1>

<form action="{{ route('admin.info.store') }}" method="POST" class="space-y-5">
    @csrf

    <input type="text" name="judul"
           class="w-full border rounded px-3 py-2"
           placeholder="Judul info" required>

    <textarea name="ringkasan" rows="3"
              class="w-full border rounded px-3 py-2"
              placeholder="Ringkasan" required></textarea>

    <textarea name="isi" rows="6"
              class="w-full border rounded px-3 py-2"
              placeholder="Isi lengkap" required></textarea>

    <select name="label" class="w-full border rounded px-3 py-2">
        <option value="Jadwal">Jadwal</option>
        <option value="Urgent">Urgent</option>
        <option value="Bantuan">Bantuan</option>
    </select>

    <input type="date" name="tanggal_posting"
           class="w-full border rounded px-3 py-2" required>

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active" checked>
        <span>Aktifkan info</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Simpan
    </button>
</form>

@endsection
