@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl p-6 mx-auto bg-white rounded shadow">

    <h1 class="mb-4 text-lg font-bold">
        Tambah Perangkat Desa
    </h1>

    <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="text-sm">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                   class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="text-sm">Foto</label>
            <input type="file" name="foto" class="w-full px-3 py-2 border rounded">
        </div>

        <button class="px-4 py-2 text-white bg-green-600 rounded">
            Simpan
        </button>
    </form>

</div>
@endsection
