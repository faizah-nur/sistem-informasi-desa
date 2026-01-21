@extends('admin.layouts.app')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Pengaturan Website</h1>

@if(session('success'))
    <div class="p-3 mb-6 text-green-800 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="p-3 mb-6 text-red-800 bg-red-100 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('admin.settings.website.update') }}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-6"
>
    @csrf
    @method('PUT')

    <!-- Nama Website -->
    <div>
        <label class="block mb-1 font-semibold">Nama Website</label>
        <input
            type="text"
            name="site_name"
            value="{{ old('site_name', $siteName) }}"
            class="w-full p-2 border rounded"
            required
        >
    </div>

    <!-- Alamat -->
    <div>
        <label class="block mb-1 font-semibold">Alamat</label>
        <input
            type="text"
            name="contact_address"
            value="{{ old('contact_address', $contactAddress) }}"
            class="w-full p-2 border rounded"
            required
        >
    </div>

    <!-- Telepon -->
    <div>
        <label class="block mb-1 font-semibold">No. Telepon</label>
        <input
            type="text"
            name="contact_phone"
            value="{{ old('contact_phone', $contactPhone) }}"
            class="w-full p-2 border rounded"
            required
        >
    </div>

    <!-- Email -->
    <div>
        <label class="block mb-1 font-semibold">Email</label>
        <input
            type="email"
            name="contact_email"
            value="{{ old('contact_email', $contactEmail) }}"
            class="w-full p-2 border rounded"
            required
        >
    </div>

    <!-- Jam Layanan -->
    <div>
        <label class="block mb-1 font-semibold">Jam Layanan</label>
        <input
            type="text"
            name="service_hours"
            value="{{ old('service_hours', $serviceHours) }}"
            class="w-full p-2 border rounded"
            placeholder="08.00 – 15.00 WIB"
            required
        >
    </div>

    <!-- Google Maps -->
    <div>
        <label class="block mb-1 font-semibold">Google Maps (Embed URL)</label>
        <textarea
            name="google_maps"
            rows="4"
            class="w-full p-2 border rounded"
            placeholder="Paste iframe embed Google Maps di sini"
        >{{ old('google_maps', $googleMaps) }}</textarea>
        <small class="text-gray-500">
            Boleh dikosongkan jika belum ada
        </small>
    </div>

    <!-- Logo -->
    <div>
        <label class="block mb-1 font-semibold">Logo Website</label>

        @if($siteLogo)
            <div class="mb-3">
                <img
                    src="{{ asset('storage/' . $siteLogo) }}"
                    alt="Logo Website"
                    class="h-20"
                >
            </div>
        @endif

        <input
            type="file"
            name="logo"
            class="block"
            accept="image/*"
        >
    </div>

    <!-- Submit -->
    <div>
        <button
            type="submit"
            class="px-6 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700"
        >
            Simpan Pengaturan
        </button>
    </div>

</form>
@endsection
