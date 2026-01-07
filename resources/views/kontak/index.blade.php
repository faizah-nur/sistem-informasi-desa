<x-app-layout>
    <x-slot name="title">
        Kontak Desa
    </x-slot>

    <!-- HERO -->
    <section class="py-16 px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-amber-500">
            Kontak Desa
        </h1>
        <p class="text-lg mt-4 text-green-600 max-w-2xl mx-auto">
            Hubungi Pemerintah Desa untuk pertanyaan, layanan, atau pengaduan.
        </p>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-14 grid md:grid-cols-2 gap-12">

        <!-- INFO -->
        <div>
            <h2 class="text-3xl font-bold text-amber-500 mb-6">
                Informasi Kontak
            </h2>

            <div class="space-y-6 text-gray-600">
                <p>📍 Jl. Raya Desa Example No. 123</p>
                <p>☎️ (+62) 812-3456-7890</p>
                <p>✉️ desaLamongan@gmail.com</p>
                <p>🕒 Senin – Jumat, 08.00 – 15.00 WIB</p>
            </div>
        </div>

        <!-- FORM -->
        <div>
            <h2 class="text-3xl font-bold text-amber-500 mb-6">
                Kirim Pesan
            </h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('kontak.store') }}" method="POST"
                  class="space-y-5 bg-white p-6 rounded-xl shadow-md border">
                @csrf

                <input name="nama" placeholder="Nama Lengkap"
                       class="w-full border px-4 py-2 rounded-lg">

                <input name="email" type="email" placeholder="Email"
                       class="w-full border px-4 py-2 rounded-lg">

                <textarea name="pesan" rows="5" placeholder="Pesan Anda"
                          class="w-full border px-4 py-2 rounded-lg"></textarea>

                <button
                    class="bg-green-700 text-white py-3 rounded-lg font-semibold w-full">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </section>

</x-app-layout>
