@extends('admin.layouts.app')

@section('content')
<div class="px-4 py-6">

    <h2 class="mb-3 text-2xl font-bold text-center text-green-700 md:text-3xl">
        Dashboard Admin
    </h2>

    <p class="mb-8 text-center text-amber-500">
        Gunakan menu di samping untuk mengelola konten website desa.
    </p>

    <!-- BUTTON GROUP -->
    <div
        class="flex flex-col items-center gap-4 sm:flex-row sm:flex-wrap sm:justify-center">

        <a href="{{ route('admin.account.edit') }}"
           class="w-full px-4 py-2 text-center text-white bg-green-700 rounded sm:w-auto hover:bg-green-800">
            Ganti Username / Password
        </a>

        <a href="{{ route('admin.settings.website') }}"
           class="w-full px-4 py-2 text-center text-white bg-green-700 rounded sm:w-auto hover:bg-green-800">
            Pengaturan
        </a>

        <form method="GET" action="{{ route('dashboard') }}" class="w-full sm:w-auto">
            <button
                class="w-full px-4 py-2 text-white rounded bg-amber-500 hover:bg-amber-600">
                Lihat Halaman User
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
            @csrf
            <button
                class="w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>

    <!-- IMAGE -->
    <div class="flex justify-center mt-10">
        <img
            src="{{ asset('img/admin.png') }}"
            alt="Admin"
            class="w-40 sm:w-64 md:w-80">
    </div>

</div>
@endsection
