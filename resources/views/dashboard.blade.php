<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

      <!-- HEADER PARALLAX -->
    <header class="relative h-[99vh] overflow-hidden">
      <!-- Layer Background -->
      <img
        id="bg"
        class="layer absolute inset-0 w-full h-full object-cover object-left translate-x-3 sm:translate-x-4 md:object-center md:translate-x-0"
        src="/img/hero.png"
      />

      <!-- Header Text -->
      <div
        class="absolute inset-0 flex flex-col items-start md:max-w-[50%] justify-center text-justify px-4"
      >
        <h1
          class="text-4xl md:text-7xl font-extrabold drop-shadow-[0_4px_10px_rgba(0,0,0,0.7)]"
        >
          Pemerintahan Desa <span class="text-amber-300">Lamongan</span>
        </h1>
        <p class="mt-4 text-md md:text-2xl opacity-90">
          Pemuda Masa Kini Pemimpin Masa Depan.
        </p>
        <ul class="flex gap-10 pt-5">
          <li>
            <a href="" class="text-sky-600"><i data-feather="map-pin"></i></a>
          </li>
          <li>
            <a href="" class="text-rose-500"
              ><i data-feather="instagram"></i
            ></a>
          </li>
          <li>
            <a href="" class="text-amber-400"><i data-feather="mail"></i></a>
          </li>
          <li>
            <a href="" class="text-green-400"
              ><i data-feather="message-square"></i
            ></a>
          </li>
        </ul>
        <button
          class="py-3 px-10 font-medium text-white bg-amber-400 mt-4 rounded-md"
        >
          Layanan
        </button>
      </div>

      <!-- MENU BAWAH HEADER  -->
      <div
        class="w-full h-auto py-3 bg-lime-500/50 absolute bottom-0 flex justify-center items-center"
      >
        <ul
          class="flex flex-wrap justify-center items-center gap-3 md:gap-6 text-sm md:text-base px-4"
        >
          <li>
            <a href="#" class="block whitespace-nowrap">Pengumuman Penting</a>
          </li>
          <li>
            <a href="#" class="block whitespace-nowrap">Progress Pembangunan</a>
          </li>
          <li>
            <a href="#" class="block whitespace-nowrap">Layanan Online</a>
          </li>
          <li><a href="#" class="block whitespace-nowrap">Kegiatan Desa</a></li>
        </ul>
      </div>
    </header>
  <main class="pt-10">
        <!-- about -->
      <section
        id="sekilas"
        class="relative py-14 px-4 overflow-hidden bg-white text-black"
      >
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
          <!-- Gambar Parallax -->
          <div
            id="sekilasImg"
            class="relative w-full h-64 md:h-80 overflow-hidden rounded-2xl shadow-lg transform transition-transform duration-300"
          > 
            <img
              src="/img/about.jpeg"
              alt="Desa Sukamaju"
              class=" w-full h-full object-cover"
            />
            {{-- <div class="absolute inset-0 bg-black/20"></div> --}}
          </div>

          <!-- Konten muncul saat discroll -->
          <div
            id="sekilasText"
          >
            <h2 class="text-3xl md:text-4xl font-extrabold text-lime-600 mb-4">
              Sekilas Tentang Desa
            </h2>

            <p class="text-gray-700 leading-relaxed mb-5">
              Desa Sukamaju adalah sebuah desa yang berkembang di wilayah
              Kecamatan Sukamakmur. Dengan masyarakat yang ramah, lingkungan
              yang asri, dan potensi pertanian yang kuat, desa ini terus
              berupaya meningkatkan kualitas hidup warganya melalui pembangunan
              berkelanjutan serta pelayanan publik yang lebih mudah diakses.
            </p>

            <a
              href="#"
              class="inline-block px-5 py-2 rounded-lg bg-lime-500 text-white font-medium hover:bg-lime-600 transition shadow-md"
            >
              Baca selengkapnya →
            </a>
          </div>
        </div>
      </section>

      <!-- Pengumuman Penting Section start -->
      <section
        class="relative py-20 bg-fixed bg-center bg-cover mt-20"
        style="background-image: url('/img/pengumuman.jpeg')"
      >
        <!-- Overlay hijau -->
        <div class="absolute inset-0 bg-lime-900/13 backdrop-blur-[3px]"></div>

        <div class="relative max-w-6xl mx-auto px-4">
          <h2
            class="text-3xl md:text-4xl font-bold text-white text-center mb-10"
          >
            Pengumuman Penting
          </h2>

          <!-- Grid Card Pengumuman -->
          <div class="grid md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div
              class="reveal flex gap-5 bg-white/90 backdrop-blur-md shadow-lg p-5 rounded-2xl border-l-4 border-green-600 transition transform hover:scale-105 duration-300"
            >
              <img src="/img/jadwalPosyandu.png" alt="img" class="max-w-20" />
              <div class="isi">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                  Jadwal Posyandu
                </h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                  Posyandu akan dilaksanakan pada
                  <b>Rabu, 12 Desember 2025</b> di
                  <b>Balai Dusun Sumberrejo</b> pukul <b>08.00–11.00 WIB</b>.
                  Ibu hamil dan balita diharapkan hadir tepat waktu.
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div
              class="reveal flex gap-5 bg-white/90 backdrop-blur-md shadow-lg p-5 rounded-2xl border-l-4 border-green-600 transition transform hover:scale-105 duration-300"
            >
              <img src="/img/kemerdekaan.png" alt="img" class="max-w-20" />
              <div class="isi">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                  Lomba Agustusan
                </h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                  Memperingati Kemerdekaan RI, akan ada berbagai lomba pada
                  <b>17 Agustus 2025</b> di Lapangan Desa. Pendaftaran dibuka
                  sampai <b>10 Agustus</b> di kantor desa.
                </p>
              </div>
            </div>

            <!-- Card 3 -->
            <div
              class="reveal flex gap-5 bg-white/90 backdrop-blur-md shadow-lg p-5 rounded-2xl border-l-4 border-green-600 transition transform hover:scale-105 duration-300"
            >
              <img src="/img/airBersih.png" alt="img" class="max-w-20" />
              <div class="isi">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                  Gangguan Air Bersih
                </h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                  Gangguan suplai air di wilayah <b>RT 04–06</b> karena
                  perbaikan jaringan. Diperkirakan normal kembali pada
                  <b>8 Desember 2025</b> pukul 21.00 WIB.
                </p>
              </div>
            </div>

            <!-- Card 4 -->
            <div
              class="reveal flex gap-5 bg-white/90 backdrop-blur-md shadow-lg p-5 rounded-2xl border-l-4 border-green-600 transition transform hover:scale-105 duration-300"
            >
              <img src="/img/bantuanSosial.png" alt="img" class="max-w-20" />
              <div class="isi">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                  Bantuan Sosial
                </h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                  Penyaluran BPNT Desember dilakukan pada
                  <b>15 Desember 2025</b> di Balai Desa. Warga diminta membawa
                  kartu identitas.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Progres pembangunan start -->
      <section class="relative py-20 overflow-hidden bg-white">
        <div class="relative max-w-5xl mx-auto px-4 space-y-10">
          <h2
            class="text-3xl md:text-4xl font-extrabold text-green-700 text-center mb-10"
          >
            Progress Pembangunan Desa
          </h2>

          <!-- CARD 1 -->
          <div
            class="reveal flex gap-5 bg-white/90 p-6 rounded-2xl shadow-lg border-l-4 border-green-600 transition transform hover:scale-[1.03] duration-300"
          >
            <img src="/img/balai.png" alt="img" class="w-28" />
            <div class="isi">
              <h3 class="text-xl font-semibold text-green-700 mb-2">
                Rehab Balai Desa — 80%
              </h3>
              <p class="text-gray-700 leading-relaxed">
                Pekerjaan renovasi balai desa sudah mencapai 80% dan saat ini
                memasuki tahap finishing interior serta pengecatan luar.
                Diharapkan selesai sepenuhnya dalam minggu ketiga bulan ini.
              </p>
              <!-- Progress Bar -->
              <div
                class="w-full bg-gray-300/50 rounded-full h-3 mt-4 overflow-hidden"
              >
                <div
                  class="h-full bg-green-600 rounded-full"
                  style="width: 80%"
                ></div>
              </div>
            </div>
          </div>

          <!-- CARD 2 -->
          <div
            class="reveal flex gap-5 bg-white/90 backdrop-blur-md p-6 rounded-2xl shadow-lg border-l-4 border-green-600 transition transform hover:scale-[1.03] duration-300"
          >
            <img src="/img/jalan.png" alt="img" class="w-28" />
            <div class="isi">
              <h3 class="text-xl font-semibold text-green-700 mb-2">
                Pembangunan Jalan Usaha Tani — Selesai
              </h3>
              <p class="text-gray-700 leading-relaxed">
                Proyek pembangunan jalan usaha tani sepanjang 1,2 km telah 100%
                selesai. Jalan baru ini diharapkan mempermudah mobilitas petani
                dan distribusi hasil tani ke pasar.
              </p>

              <!-- Progress Bar -->
              <div
                class="w-full bg-gray-300/50 rounded-full h-3 mt-4 overflow-hidden"
              >
                <div
                  class="h-full bg-green-600 rounded-full"
                  style="width: 100%"
                ></div>
              </div>
            </div>
          </div>

          <!-- CARD 3 -->
          <div
            class="reveal flex gap-5 bg-white/90 backdrop-blur-md p-6 rounded-2xl shadow-lg border-l-4 border-green-600 transition transform hover:scale-[1.03] duration-300"
          >
            <img src="/img/posyandu.png" alt="img" class="w-28" />
            <div class="isi">
              <h3 class="text-xl font-semibold text-green-700 mb-2">
                Renovasi Posyandu — Dalam Proses
              </h3>
              <p class="text-gray-700 leading-relaxed">
                Renovasi posyandu sedang berjalan dengan fokus pada perbaikan
                atap, pengecatan ulang, dan penyediaan ruang tunggu yang lebih
                nyaman. Ditargetkan selesai pada awal bulan depan.
              </p>

              <!-- Progress Bar -->
              <div
                class="w-full bg-gray-300/50 rounded-full h-3 mt-4 overflow-hidden"
              >
                <div
                  class="h-full bg-green-600 rounded-full"
                  style="width: 60%"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Progres pembangunan end -->

      <!-- layanan start -->
      <section class="py-10">
        <h2
          class="text-3xl md:text-4xl font-extrabold text-green-700 text-center mb-10"
        >
          Layanan Online Desa
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
          <!-- SKCK -->
          <a
            href="#"
            class="reveal flex flex-col items-center p-5 bg-green-100 shadow-[20px_20px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition"
          >
            <div class="text-4xl mb-3 max-w-24">
              <img src="/img/skck.png" alt="img" />
            </div>
            <p class="font-medium text-center text-green-700">
              Surat Pengantar SKCK
            </p>
          </a>

          <!-- Domisili -->
          <a
            href="#"
            class="reveal flex flex-col items-center p-5 bg-green-100 shadow-[20px_20px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition"
          >
            <div class="text-4xl mb-3 max-w-24">
              <img src="/img/keteranganDomisili.png" alt="img" />
            </div>
            <p class="font-medium text-center text-green-700">Surat Domisili</p>
          </a>

          <!-- SKTM -->
          <a
            href="#"
            class="reveal flex flex-col items-center p-5 bg-green-100 shadow-[20px_20px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition"
          >
            <div class="text-4xl mb-3 max-w-24">
              <img src="/img/sktm.png" alt="img" />
            </div>
            <p class="font-medium text-center text-green-700">SKTM</p>
          </a>

          <!-- Surat Usaha -->
          <a
            href="#"
            class="reveal flex flex-col items-center p-5 bg-green-100 shadow-[20px_20px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition"
          >
            <div class="text-4xl mb-3 max-w-24">
              <img src="/img/keteranganKerja.png" alt="img" />
            </div>
            <p class="font-medium text-center text-green-700">
              Keterangan Usaha
            </p>
          </a>
        </div>
      </section>
      <!-- layanan end -->

      <!-- galery start -->
      <section class="mt-40">
        <h2
          class="text-3xl md:text-4xl font-extrabold text-green-700 text-center mb-10"
        >
          Galery Kegiatan
        </h2>
        <div class="mt-20 p-2 md:p-4 grid gap-2 grid-cols-2 md:grid-cols-4">
          <h1
            class="text-slate-800 text-xl md:col-start-4 md:row-start-2 md:flex md:items-center md:justify-center"
          >
            <span>Pemerintahan Desa</span>
          </h1>
          <h1
            class="text-slate-800 text-lg font-bold md:col-start-2 md:row-start-2 md:flex md:items-end md:justify-center"
          >
            <span> @Desa~lamongan</span>
          </h1>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/1.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] md:col-start-3 overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/2.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/9.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/4.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/5.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] md:col-start-2 overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/6.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] md:col-start-4 overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/7.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/8.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] md:col-start-3 overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/3.jpeg') }}')"
            ></div>
          </div>
          <div
            class="bg-rose-500 aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect-[4/3] md:col-start-3 overflow-hidden group relative hover:scale-95 transition-all duration-500"
          >
            <div
              class="w-full h-full bg-cover absolute group-hover:scale-125 group-hover:rotate-12 transition-all duration-500"
              style="background-image: url('{{ asset('img/kegiatan/10.jpeg') }}')"
            ></div>
          </div>
        </div>
        <!-- galery end -->
      </section>
    </main>
</x-app-layout>
