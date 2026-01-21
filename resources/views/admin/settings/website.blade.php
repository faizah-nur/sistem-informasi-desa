@extends('admin.layouts.app')

@section('content')
<h1 class="mb-4 text-xl font-bold">Pengaturan Website</h1>

@if(session('success'))
    <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.settings.website.update') }}"
      method="POST"
      enctype="multipart/form-data"
      class="max-w-lg space-y-5">

    @csrf
    @method('PUT')

    {{-- Site Name --}}
    <div>
        <label class="block mb-1 font-semibold">Nama Website</label>
        <input type="text"
               name="site_name"
               value="{{ old('site_name', $siteName ?? '') }}"
               class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200"
               required>
    </div>

    {{-- Logo --}}
    <div>
        <label class="block mb-1 font-semibold">Logo Website</label>

        @if (!empty($siteLogo))
            <img src="{{ asset('storage/'.$siteLogo) }}"
                 alt="Logo Website"
                 class="h-16 mb-2">
        @endif

        <input type="file"
               name="logo"
               class="block w-full">
        <small class="text-gray-500">
            Kosongkan jika tidak ingin mengganti logo
        </small>
    </div>

    {{-- Submit --}}
    <button type="submit"
            class="px-5 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
        Simpan Pengaturan
    </button>
</form>
@endsection
