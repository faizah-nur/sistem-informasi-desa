<x-app-layout>
    <x-slot name="title">
        Kontak Desa
    </x-slot>

    <section class="max-w-6xl mx-auto px-6 py-14 grid md:grid-cols-2 gap-12 ">

        <!-- INFO -->
        <div>
            <h2 class="text-3xl font-bold text-slate-800 mb-6 mt-8">
                Informasi Kontak
            </h2>

            <div class="space-y-6 text-gray-600">
                <p>📍 Jl. Raya Desa Example No. 123</p>
                <p>☎️ (+62) 812-3456-7890</p>
                <p>✉️ desaLamongan@gmail.com</p>
                <p>🕒 Senin – Jumat, 08.00 – 15.00 WIB</p>
                <div class="w-full lg:w-7/12">
    <!-- MAP CARD -->
    <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-lg bg-gray-200">

        <!-- Optional label -->
        <div class="absolute top-3 left-3 z-10 bg-black/50 text-white text-xs px-3 py-1 rounded-full">
            Kantor Desa Lamongan
        </div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0252103140942!2d112.42038657606133!3d-7.123075769858069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f75359cfa605%3A0xea09493017cf48d7!2sJl.%20Veteran%20No.53A%2C%20Jetis%2C%20Kec.%20Lamongan%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur%2062211!5e0!3m2!1sid!2sid!4v1765720578321!5m2!1sid!2sid"
            class="absolute inset-0 w-full h-full border-0"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
        </iframe>
    </div>

    <!-- BUTTON -->
    <div class="mt-4 flex justify-end">
        <a href="https://www.google.com/maps?q=Jl.+Veteran+No.53A,+Jetis,+Lamongan"
           target="_blank"
           class="inline-flex items-center gap-2 text-sm font-medium
                  px-4 py-2 rounded-full
                  bg-emerald-600 text-white
                  hover:bg-emerald-500
                  transition">
            📍 Buka di Google Maps
        </a>
    </div>
</div>

            </div>
        </div>

        <!-- FORM -->
        <div>
            <h2 class="text-3xl font-bold text-slate-800 mb-6 mt-8">
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
