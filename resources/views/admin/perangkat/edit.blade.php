@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl p-6 mx-auto bg-white rounded shadow">

    <h1 class="mb-4 text-lg font-bold">
        Edit Perangkat Desa
    </h1>

    <form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="text-sm">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $perangkat->nama) }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $perangkat->jabatan) }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Foto</label>
            @if($perangkat->foto)
                <img src="{{ asset('storage/' . $perangkat->foto) }}" alt="Foto" class="object-cover w-20 h-20 mb-2 rounded">
            @endif
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded">
        </div>

        <button class="px-4 py-2 text-white bg-blue-600 rounded">
            Update
        </button>
    </form>

</div>
@endsection
