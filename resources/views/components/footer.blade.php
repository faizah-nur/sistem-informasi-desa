  {{-- <header class="relative mt-20 bg-gray-900 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-white">{{ $slot }}</h1>
    </div>
  </header> --}}
      <!-- FOOTER -->
    <footer class="pt-12 pb-6 mt-20 text-white bg-green-700 backdrop-blur-md">
      <div
        class="grid grid-cols-1 gap-10 px-6 mx-auto max-w-7xl md:grid-cols-4"
      >
        <!-- Kolom 1: Profil -->
        <div>
          <h2 class="mb-4 text-2xl font-bold text-lime-400">Desa Lamongan</h2>
          <p class="text-sm leading-relaxed text-gray-300">
            Desa Lamongan, Kecamatan Lamongan.<br />
            Desa yang terus berkembang dengan semangat gotong royong, pelayanan
            publik modern, dan pembangunan berkelanjutan.
          </p>
        </div>

        <!-- Kolom 2: Navigasi -->
        <div>
          <h3 class="mb-3 text-lg font-semibold text-lime-300">Navigasi</h3>
          <ul class="space-y-2 text-sm text-gray-300">
            <li>
              <a href="{{ route('kabar.index') }}" class="transition hover:text-white">Kabar Desa</a>
            </li>
            <li>
              <a href="{{ route('layanan.index') }}" class="transition hover:text-white">Layanan Online</a>
            </li>
            <li><a href="{{ route('kontak.index') }}" class="transition hover:text-white">Kontak</a></li>
          </ul>
        </div>

        <!-- Kolom 3: Layanan -->
        <div>
          <h3 class="mb-3 text-lg font-semibold text-lime-300">
            Layanan Online
          </h3>
          <ul class="space-y-2 text-sm text-gray-300">
            <li>
              <a href="{{ route('layanan.index') }}" class="transition hover:text-white">Pengajuan SKCK</a>
            </li>
            <li>
              <a href="{{ route('layanan.index') }}" class="transition hover:text-white">Surat Domisili</a>
            </li>
            <li>
              <a href="{{ route('layanan.index') }}" class="transition hover:text-white">Surat Usaha</a>
            </li>
            <li>
              <a href="{{ route('layanan.index') }}" class="transition hover:text-white">Bantuan Sosial</a>
            </li>
          </ul>
        </div>

        <!-- Kolom 4: Kontak -->
        <div>
          <h3 class="mb-3 text-lg font-semibold text-lime-300">Kontak Desa</h3>
          <ul class="space-y-3 text-sm text-gray-300">
            <li>📍 Balai Desa Lamongan</li>
            <li>☎️ (021) 88997766</li>
            <li>✉️ desa.lamongan@mail.com</li>
            <li>🕐 Jam Layanan: 08.00–15.00 WIB</li>
          </ul>
        </div>
      </div>

      <!-- Garis -->
      <div class="px-6 mx-auto mt-10 max-w-7xl">
        <div class="border-t border-gray-500/40"></div>
      </div>

      <!-- Copyright -->
      <div class="mt-4 text-sm text-center text-gray-400">
        © 2025 Pemerintah Desa Lamongan. All rights reserved.
      </div>
    </footer>
  