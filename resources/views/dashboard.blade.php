<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
<!-- HERO -->
<section class="relative w-full min-h-screen overflow-hidden">

  <div
    class="absolute top-[-30%] left-1/2 -translate-x-1/2
           w-[1000px] h-[1000px]
           blur-3xl opacity-100
           pointer-events-none
           z-0"
    style="
      background: radial-gradient(
        circle,
        rgb(241, 98, 9) 10%,
        rgba(255,220,120,0.7) 30%,
        rgba(255,220,120,0.35) 50%,
        transparent 70%
      );
    "
  ></div>

  <div
    class="absolute inset-0 z-10
           bg-gradient-to-b
           from-amber-100/70
           via-emerald-100/80
           to-emerald-200">
  </div>

  <!-- CONTENT -->
  <div class="relative z-20 min-h-screen flex flex-col justify-center items-center px-4">

    <h1
      class="font-['Bebas_Neue'] font-black text-green-700 drop-shadow-xl
             mb-3 text-center
             text-3xl sm:text-4xl md:text-6xl
             tracking-[2px] sm:tracking-[3px] md:tracking-[5px]">
      PEMERINTAHAN LAMONGAN
    </h1>

    <!-- IMAGES -->
    <div class="flex justify-center gap-2 sm:gap-3 md:gap-4">

      <div class="hidden md:block image-card">
        <img src="img/h1.jpeg" alt="">
      </div>

      <div class="hidden sm:block image-card">
        <img src="img/h2.jpeg" alt="">
      </div>

      <div class="image-card">
        <img src="img/h3.jpeg" alt="">
      </div>

      <div class="image-card shadow-none hover:scale-100">
        <img src="img/bendera.png" alt="">
      </div>

      <div class="image-card">
        <img src="img/h4.jpeg" alt="">
      </div>

      <div class="hidden sm:block image-card">
        <img src="img/h5.jpeg" alt="">
      </div>

      <div class="hidden md:block image-card">
        <img src="img/h6.jpeg" alt="">
      </div>

    </div>

        <!-- SOCIAL ICONS -->
    <div class="flex gap-3 sm:gap-4 md:gap-5 text-green-700 mt-3 md:mt-5">

      <a href="https://instagram.com/desaLamongan" target="_blank" class="icon-link">
        <i data-feather="instagram"></i>
      </a>

      <a href="https://facebook.com/desaLamongan" target="_blank" class="icon-link">
        <i data-feather="facebook"></i>
      </a>

      <a href="https://twitter.com/desaLamongan" target="_blank" class="icon-link">
        <i data-feather="twitter"></i>
      </a>

      <a href="mailto:desaLamongan@gmail.com" class="icon-link">
        <i data-feather="mail"></i>
      </a>

      <a href="https://maps.google.com/?q=Desa+Lamongan" target="_blank" class="icon-link">
        <i data-feather="map-pin"></i>
      </a>

      <a href="https://wa.me/628123456789" target="_blank" class="icon-link">
        <i data-feather="message-square"></i>
      </a>

    </div>

    <a
      href="{{ route('layanan.index') }}"
      class="inline-block mt-5 px-5 py-2
             rounded-lg bg-amber-600 text-white
             hover:bg-amber-500 transition">
      LAYANAN
    </a>

  </div>
  <div class="hero absolute z-40 bottom-0 overflow-hidden bg-green-700 border-green-700 text-white py-0">
      <div class="flex items-center gap-4">
  
          <img class="max-w-14" src="img/logounisla.png" alt="img">
  
          <div class="overflow-hidden w-full">
              <div class="ticker flex gap-12 whitespace-nowrap">
                  @foreach ($kabar as $item)
                      <span class="font-semibold">
                          {{ $item->judul }}
                      </span>
                  @endforeach
              </div>
          </div>
  
      </div>
  </div>
</section>




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
            <img src="{{ $tentang && $tentang->gambar ? asset('storage/' . $tentang->gambar)
              : asset('img/about.jpeg') }}" alt="Tentang Desa" class="w-full h-full object-cover"
          />
            {{-- <div class="absolute inset-0 bg-black/20"></div> --}}
          </div>

          <!-- Konten muncul saat discroll -->
          <div
            id="sekilasText"
          >
        <h2 class="text-3xl md:text-4xl font-extrabold text-lime-600 mb-4">
            {{ $tentang->judul ?? 'Sekilas Tentang Desa' }}
        </h2>

          <p class="text-gray-700 leading-relaxed mb-5">
              {{ $tentang->deskripsi ?? '-' }}
          </p>

            {{-- <a
              href="#"
              class="inline-block px-5 py-2 rounded-lg bg-lime-500 text-white font-medium hover:bg-lime-600 transition shadow-md"
            >
              Baca selengkapnya →
            </a> --}}
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
    @forelse ($pengumuman as $item)
        <div
            class="reveal flex gap-5 bg-white/90 backdrop-blur-md shadow-lg p-5 rounded-2xl border-l-4 border-green-600 transition transform hover:scale-105 duration-300"
        >
            {{-- <img src="{{ asset('img/pengumuman.png') }}" alt="img" class="max-w-20" /> --}}

            <div class="isi">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                    {{ $item->judul }}
                </h3>

                <p class="text-gray-700 text-sm leading-relaxed">
                    {{ $item->ringkasan }}
                </p>

                <p class="text-xs text-gray-500 mt-2">
                    {{ $item->tanggal->translatedFormat('d F Y') }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center text-white col-span-2">
            Belum ada pengumuman
        </p>
    @endforelse
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

@foreach ($progress as $item)
    <div
        class="reveal flex gap-5 bg-white/90 p-6 rounded-2xl shadow-lg border-l-4 border-green-600 transition transform hover:scale-[1.03] duration-300"
    >

        <div class="isi w-full">
            <h3 class="text-xl font-semibold text-green-700 mb-2">
                {{ $item->judul_kegiatan }}
                —
                {{ $item->status }}
            </h3>

            <p class="text-gray-700 leading-relaxed">
                {{ $item->deskripsi }}
            </p>

            <!-- Progress Bar -->
            <div class="w-full bg-gray-300/50 rounded-full h-3 mt-4 overflow-hidden">
                <div
                    class="h-full bg-green-600 rounded-full transition-all duration-500"
                    style="width: {{ $item->persentase_progress }}%"
                ></div>
            </div>

            <p class="text-xs text-gray-500 mt-2">
                Progress {{ $item->persentase_progress }}%
            </p>
        </div>
    </div>
@endforeach

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
            href="{{ route('layanan.index') }}"
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
            href="{{ route('layanan.index') }}"
            class="reveal flex flex-col items-center p-5 bg-green-100 shadow-[20px_20px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition"
          >
            <div class="text-4xl mb-3 max-w-24">
              <img src="/img/keteranganDomisili.png" alt="img" />
            </div>
            <p class="font-medium text-center text-green-700">Surat Domisili</p>
          </a>

          <!-- SKTM -->
          <a
            href="{{ route('layanan.index') }}"
            class="reveal flex flex-col items-center p-5 bg-green-100 shadow-[20px_20px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition"
          >
            <div class="text-4xl mb-3 max-w-24">
              <img src="/img/sktm.png" alt="img" />
            </div>
            <p class="font-medium text-center text-green-700">SKTM</p>
          </a>

          <!-- Surat Usaha -->
          <a
            href="{{ route('layanan.index') }}"
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

<!-- GALERI START -->
<section class="mt-40">
    <h2 class="text-3xl md:text-4xl font-extrabold text-green-700 text-center mb-10">
        Galeri Kegiatan Desa
    </h2>

    <div class="mt-10 px-4 grid gap-4 grid-cols-2 md:grid-cols-4">
        @forelse ($galeri as $item)
            <div
                class="relative aspect-[4/3] rounded-xl overflow-hidden shadow-md
                       group transition-all duration-300 hover:shadow-xl"
            >
                <!-- IMAGE -->
                <div
                    class="absolute inset-0 bg-cover bg-center
                           transition-transform duration-500
                           group-hover:scale-110"
                    style="background-image: url('{{ asset('storage/' . $item->gambar) }}')"
                ></div>

                <!-- OVERLAY -->
                <div
                    class="absolute inset-0 bg-black/40 opacity-0
                           group-hover:opacity-100 transition-all duration-300"
                ></div>

                <!-- TEXT -->
                <div
                    class="absolute bottom-0 left-0 right-0 p-3
                           text-white translate-y-6 opacity-0
                           group-hover:translate-y-0 group-hover:opacity-100
                           transition-all duration-300"
                >
                    <p class="text-sm font-semibold">
                        {{ $item->judul }}
                    </p>
                    <p class="text-xs text-gray-200">
                        {{ $item->kategori }}
                    </p>
                </div>
            </div>
        @empty
            <!-- EMPTY STATE -->
            <div class="col-span-2 md:col-span-4 text-center py-16 text-gray-500">
                <p class="text-lg font-semibold">
                    Belum ada galeri kegiatan
                </p>
                <p class="text-sm mt-1">
                    Dokumentasi kegiatan desa akan ditampilkan di sini.
                </p>
            </div>
        @endforelse
    </div>
</section>
<!-- GALERI END -->


@if($popupKabars->isNotEmpty())
<div
    id="popup-kabar"
    class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center"
>
    {{-- POPUP CARD --}}
    <div
        class="relative bg-green-400/40 max-w-md w-full rounded-2xl overflow-hidden animate-fadeIn"
        onclick="event.stopPropagation()"
    >

        {{-- CLOSE BUTTON --}}
        <button
            id="closePopup"
            class="absolute top-3 right-3 z-50 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow hover:bg-gray-100 transition"
            aria-label="Tutup popup"
        >
            ✕
        </button>

        {{-- GAMBAR --}}
        <img
            src="{{ asset('storage/' . $popupKabars->first()->gambar) }}"
            class="w-full h-56 object-cover"
            alt="{{ $popupKabars->first()->judul }}"
        >

        {{-- CONTENT --}}
        <div class="p-5 text-center">
            <h3 class="text-lg font-bold text-white mb-2">
                {{ $popupKabars->first()->judul }}
            </h3>

            <p class="text-sm text-white mb-4 line-clamp-3">
                {{ Str::limit(strip_tags($popupKabars->first()->isi), 120) }}
            </p>

            <a
                href="{{ route('kabar.show', $popupKabars->first()->slug) }}"
                class="inline-block bg-amber-500 text-white px-5 py-2 rounded-lg hover:bg-amber-600 transition"
            >
                Baca Selengkapnya
            </a>
        </div>

    </div>
</div>
@endif



    </main>
</x-app-layout>
