@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-4 text-2xl font-bold text-center text-green-700">
        Dashboard Admin
    </h2>

    <p class="text-center text-amber-500">
        Gunakan menu di samping untuk mengelola konten website desa.
    </p>
    <div class="flex justify-center gap-3 mt-10">
        <a href="{{ route('admin.account.edit') }}" class="block px-3 py-2 text-white bg-green-700 rounded max-w-64 hover:bg-green-800">
            Ganti Username atau password
        </a>
        <a href="{{ route('admin.settings.website') }}" class="block px-3 py-2 text-white bg-green-700 rounded max-w-64 hover:bg-green-800">
            Ganti Logo
        </a>
    </div>
    <img src="{{ asset('img/admin.png') }}" alt="img" class="mx-auto max-w-96" />

@endsection
