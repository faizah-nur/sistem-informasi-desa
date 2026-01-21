<x-app-layout>
    <x-slot name="title">
        Kontak Desa
    </x-slot>

    <section class="grid max-w-6xl gap-12 px-6 mx-auto py-14 md:grid-cols-2 ">

        <!-- INFO -->
        <div>
            <h2 class="mt-8 mb-6 text-3xl font-bold text-slate-800">
                Informasi Kontak
            </h2>

            <div class="space-y-6 text-gray-600">
                <p>📍 {{ \App\Models\Setting::get('contact_address') }}</p>
                <p>☎️ {{ \App\Models\Setting::get('contact_phone') }}</p>
                <p>✉️ {{ \App\Models\Setting::get('contact_email') }}</p>
                <p>🕒 Jam Layanan: {{ \App\Models\Setting::get('service_hours') }}</p>
                <div class="w-full lg:w-7/12">
    <!-- MAP CARD -->
    <div class="relative w-full overflow-hidden bg-gray-200 shadow-lg aspect-video rounded-2xl">

        <!-- Optional label -->
        <div class="absolute z-10 px-3 py-1 text-xs text-white rounded-full top-3 left-3 bg-black/50">
            Kantor Desa Lamongan
        </div>

        <div class="relative w-full h-64 overflow-hidden rounded">
            {!! \App\Models\Setting::get('google_maps') !!}
        </div>
    </div>

    <!-- BUTTON -->
    <div class="flex justify-end mt-4">
        <a href="https://www.google.com/maps?q=Jl.+Veteran+No.53A,+Jetis,+Lamongan"
           target="_blank"
           class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition rounded-full bg-emerald-600 hover:bg-emerald-500">
            📍 Buka di Google Maps
        </a>
    </div>
</div>

            </div>
        </div>

        <!-- FORM -->
        <div>
            <h2 class="mt-8 mb-6 text-3xl font-bold text-slate-800">
                Kirim Pesan
            </h2>

            @if (session('success'))
                <div class="p-3 mb-4 text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('kontak.store') }}" method="POST"
                  class="p-6 space-y-5 bg-white border shadow-md rounded-xl">
                @csrf

                <input name="nama" placeholder="Nama Lengkap"
                       class="w-full px-4 py-2 border rounded-lg">

                <input name="email" type="email" placeholder="Email"
                       class="w-full px-4 py-2 border rounded-lg">

                <textarea name="pesan" rows="5" placeholder="Pesan Anda"
                          class="w-full px-4 py-2 border rounded-lg"></textarea>

                <button
                    class="w-full py-3 font-semibold text-white bg-green-700 rounded-lg">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </section>

</x-app-layout>
