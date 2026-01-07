@extends('admin.layouts.app')

@section('content')

  <h1 class="text-2xl font-bold mb-6">Edit Pengumuman</h1>

  {{-- Error --}}
  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form
    action="{{ route('admin.pengumuman.update', $pengumuman->id) }}"
    method="POST"
    class="space-y-4"
  >
    @csrf
    @method('PUT')

    <div>
      <label class="font-semibold">Judul</label>
      <input
        type="text"
        name="judul"
        value="{{ old('judul', $pengumuman->judul) }}"
        class="w-full border rounded p-2"
      >
    </div>

    <div>
      <label class="font-semibold">Isi</label>
      <textarea
        name="isi"
        rows="5"
        class="w-full border rounded p-2"
      >{{ old('isi', $pengumuman->isi) }}</textarea>
    </div>

    <div>
      <label class="font-semibold">Tanggal</label>
      <input
        type="date"
        name="tanggal"
        value="{{ old('tanggal', $pengumuman->tanggal) }}"
        class="border rounded p-2"
      >
    </div>

    <div class="flex items-center gap-2">
      <input
        type="checkbox"
        name="is_published"
        value="1"
        {{ $pengumuman->is_published ? 'checked' : '' }}
      >
      <span>Publish</span>
    </div>

    <button class="bg-green-700 text-white px-4 py-2 rounded">
      Simpan Perubahan
    </button>
  </form>
@endsection
