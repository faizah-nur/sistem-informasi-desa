@extends('admin.layouts.app')
@section('content')
    <h2 class="text-2xl font-bold text-center text-green-700 mb-4">
        Dashboard Admin
    </h2>

    <p class="text-amber-500 text-center">
        Gunakan menu di samping untuk mengelola konten website desa.
    </p>
    <img src="{{ asset('img/admin.png') }}" alt="img" class="max-w-96 mx-auto" />

@endsection
