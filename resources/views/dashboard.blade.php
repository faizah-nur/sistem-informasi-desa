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

{{-- <section class="min-h-screen flex items-center">
  <div class="container mx-auto grid md:grid-cols-2 items-center gap-10">
    
    <!-- Text -->
    <div>
      <h1 class="text-4xl font-bold mb-4">
        Petani Modern Desa
      </h1>
      <p class="text-gray-600">
        Mendukung pertanian lokal dengan teknologi
      </p>
    </div>

    <!-- Image -->
    <div class="relative w-[350px] h-[350px] mx-auto">
      <img
        src="{{ asset('images/blob.png') }}"
        class="absolute inset-0 animate-spin-slow"
      >
      <img
        src="{{ asset('images/person.png') }}"
        class="relative z-10"
      >
    </div>

  </div>
</section> --}}

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
            <img src="{{ asset('img/pengumuman.png') }}" alt="img" class="max-w-20" />

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
        <img
            src="{{ $item->ikon ? asset('storage/' . $item->ikon) : asset('img/default-progress.png') }}"
            alt="img"
            class="w-28"
        />

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
    @forelse ($galeri as $item)
        <div
            class="aspect-[4/3] rounded-lg overflow-hidden group relative hover:scale-95 transition-all duration-500"
        >
            <div
                class="w-full h-full bg-cover bg-center absolute
                       group-hover:scale-125 group-hover:rotate-12
                       transition-all duration-500"
                style="background-image: url('{{ asset('storage/' . $item->gambar) }}')"
            ></div>
        </div>
    @empty
        <p class="col-span-4 text-center text-gray-500">
            Belum ada galeri kegiatan
        </p>
    @endforelse
</div>

        <!-- galery end -->
      </section>
    </main>
</x-app-layout>
