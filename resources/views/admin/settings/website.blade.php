@extends('admin.layouts.app')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Pengaturan Website & Surat</h1>

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
    class="space-y-10"
>
    @csrf
    @method('PUT')

    {{-- ================= WEBSITE ================= --}}
    <div class="p-6 space-y-4 bg-white border rounded shadow-sm">
        <h2 class="text-lg font-bold text-gray-700">Informasi Website</h2>

        <div>
            <label class="block mb-1 font-semibold">Nama Website</label>
            <input type="text" name="site_name"
                value="{{ old('site_name', $siteName) }}"
                class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Alamat</label>
            <input type="text" name="contact_address"
                value="{{ old('contact_address', $contactAddress) }}"
                class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">No. Telepon</label>
            <input type="text" name="contact_phone"
                value="{{ old('contact_phone', $contactPhone) }}"
                class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="contact_email"
                value="{{ old('contact_email', $contactEmail) }}"
                class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Jam Layanan</label>
            <input type="text" name="service_hours"
                value="{{ old('service_hours', $serviceHours) }}"
                class="w-full p-2 border rounded"
                placeholder="08.00 – 15.00 WIB">
        </div>
        
    <!-- Google Maps --> 
    <div> 
        <label class="block mb-1 font-semibold">Google Maps (Embed URL)</label> 
        <textarea name="google_maps" rows="4" class="w-full p-2 border rounded" placeholder="Paste iframe embed Google Maps di sini" >{{ old('google_maps', $googleMaps) }}</textarea>
        <small class="text-gray-500"> Boleh dikosongkan jika belum ada </small>
    </div>
</div>

    {{-- ================= KOP SURAT ================= --}}
    <div class="p-6 space-y-4 bg-white border rounded shadow-sm">
        <h2 class="text-lg font-bold text-gray-700">Kop Surat</h2>

        <div>
            <label class="block mb-1 font-semibold">Nama Instansi</label>
            <input type="text" name="kop_instansi"
                value="{{ old('kop_instansi', setting('kop_instansi')) }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Alamat Kop</label>
            <textarea name="kop_alamat" rows="2"
                class="w-full p-2 border rounded">{{ old('kop_alamat', setting('kop_alamat')) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Telepon Kop</label>
            <input type="text" name="kop_telepon"
                value="{{ old('kop_telepon', setting('kop_telepon')) }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Logo Kop Surat</label>
            @if(setting('kop_logo'))
                <img src="{{ asset('storage/'.setting('kop_logo')) }}" class="h-16 mb-2">
            @endif
            <input type="file" name="kop_logo" accept="image/*">
        </div>
    </div>

    {{-- ================= TTD ================= --}}
    <div class="p-6 space-y-4 bg-white border rounded shadow-sm">
        <h2 class="text-lg font-bold text-gray-700">Tanda Tangan Surat</h2>

        <div>
            <label class="block mb-1 font-semibold">Nama Penandatangan</label>
            <input type="text" name="ttd_nama"
                value="{{ old('ttd_nama', setting('ttd_nama')) }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Jabatan</label>
            <input type="text" name="ttd_jabatan"
                value="{{ old('ttd_jabatan', setting('ttd_jabatan')) }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">NIP</label>
            <input type="text" name="ttd_nip"
                value="{{ old('ttd_nip', setting('ttd_nip')) }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Gambar TTD</label>
            @if(setting('ttd_image'))
                <img src="{{ asset('storage/'.setting('ttd_image')) }}" class="h-16 mb-2">
            @endif
            <input type="file" name="ttd_image" accept="image/*">
        </div>
    </div>

    <button
        type="submit"
        class="px-6 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
        Simpan Semua Pengaturan
    </button>

</form>
@endsection
