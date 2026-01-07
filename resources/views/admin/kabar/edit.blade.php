@extends('admin.layouts.app')
@section('content')
@section('title', 'Edit Kabar')
<h1 class="text-2xl font-bold mb-6 text-green-700">
    Edit Kabar
</h1>

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

<form action="{{ route('admin.kabar.update', $kabar->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-5">
    @csrf
    @method('PUT')

    <input type="text" name="judul"
           value="{{ $kabar->judul }}"
           class="w-full border rounded px-3 py-2" required>

    <img src="{{ asset('storage/' . $kabar->gambar) }}"
         class="w-48 rounded">

    <input type="file" name="gambar"
           class="w-full border rounded px-3 py-2">

    <textarea name="isi" rows="6"
              class="w-full border rounded px-3 py-2" required>{{ $kabar->isi }}</textarea>

    <input type="text" name="kategori"
           value="{{ $kabar->kategori }}"
           class="w-full border rounded px-3 py-2">


    <div class="mt-4">
    <label class="flex items-center gap-2 cursor-pointer">
        <input
            type="checkbox"
            name="is_popup"
            value="1"
            class="rounded border-green-700 text-green-600 focus:ring-green-500"
            {{ old('is_popup', $kabar->is_popup) ? 'checked' : '' }}
        >
        <span class="text-sm text-gray-700">
            Tampilkan sebagai popup di dashboard
        </span>
    </label>
</div>
  <p class="text-red-600 italic">* tanggal wajib diisi</p>
    <input type="date" name="tanggal_publish"
           value="{{ $kabar->tanggal_publish }}"
           class="w-60 border rounded px-3 py-2">

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active"
               {{ $kabar->is_active ? 'checked' : '' }}>
        <span>Publikasikan</span>
    </label>

    <button class="bg-green-700 text-white px-6 py-2 rounded">
        Update
    </button>
</form>

@endsection
