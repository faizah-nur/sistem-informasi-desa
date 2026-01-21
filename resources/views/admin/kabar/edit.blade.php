@extends('admin.layouts.app')
@section('content')
@section('title', 'Edit Kabar')
<h1 class="mb-6 text-2xl font-bold text-green-700">
    Edit Kabar
</h1>

  {{-- Error --}}
  @if ($errors->any())
    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded">
      <ul class="pl-5 list-disc">
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
           class="w-full px-3 py-2 border rounded" required>

    <img src="{{ asset('storage/' . $kabar->gambar) }}"
         class="w-48 rounded">

    <input type="file" name="gambar"
           class="w-full px-3 py-2 border rounded">

    <textarea name="isi" rows="6"
              class="w-full px-3 py-2 border rounded" required>{{ $kabar->isi }}</textarea>

    <input type="text" name="kategori"
           value="{{ $kabar->kategori }}"
           class="w-full px-3 py-2 border rounded">


    <div class="mt-4">
    {{-- <label class="flex items-center gap-2 cursor-pointer">
        <input
            type="checkbox"
            name="is_popup"
            value="1"
            class="text-green-600 border-green-700 rounded focus:ring-green-500"
            {{ old('is_popup', $kabar->is_popup) ? 'checked' : '' }}
        >
        <span class="text-sm text-gray-700">
            Tampilkan sebagai popup di dashboard
        </span>
    </label> --}}
</div>
  <p class="italic text-red-600">* tanggal wajib diisi</p>
    <input type="date" name="tanggal_publish"
           value="{{ $kabar->tanggal_publish }}"
           class="px-3 py-2 border rounded w-60">

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active"
               {{ $kabar->is_active ? 'checked' : '' }}>
        <span>Publikasikan</span>
    </label>

    <button class="px-6 py-2 text-white bg-green-700 rounded">
        Update
    </button>
</form>

@endsection
