<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
<!-- HERO -->
<section class="bg-white min-h-screen flex items-center relative">
  <div class="max-w-7xl w-full mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

      <!-- KONTEN KIRI -->
      <div class="text-center lg:text-left">
        <h2
          class="font-bold text-green-700
                 text-3xl sm:text-4xl md:text-5xl lg:text-[4.5rem]
                 leading-tight"
        >
          Pemerintahan Lamongan
        </h2>

        <p class="mt-4 text-slate-700 text-sm sm:text-base md:text-lg">
          Sistem Informasi Layanan Desa berbasis digital yang dirancang untuk
          mempermudah pengajuan surat, meningkatkan efisiensi pelayanan
          administrasi, serta mewujudkan transparansi dan kenyamanan bagi
          masyarakat.
        </p>

        <a
          href="{{ route('layanan.index') }}"
          class="inline-block mt-6 px-6 py-2 rounded-lg
                 bg-amber-600 text-white font-medium
                 hover:bg-amber-500 transition"
        >
          LAYANAN
        </a>
        <a
          href="#pengumuman"
          class="inline-block mt-6 px-6 py-2 rounded-lg
                 bg-amber-600 text-white font-medium
                 hover:bg-amber-500 transition"
        >
          PENGUMUMAN
        </a>
        <a
          href="#progres"
          class="inline-block mt-6 px-6 py-2 rounded-lg
                 bg-amber-600 text-white font-medium
                 hover:bg-amber-500 transition"
        >
          PROGRES PEMBANGUNAN
        </a>
      </div>

      <!-- KONTEN KANAN -->
      <div>
        <div
          class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2
                 gap-4 sm:gap-6 max-w-4xl mx-auto"
        >

          <!-- ITEM -->
          <a
            href="{{ route('layanan.index') }}"
            class="reveal flex flex-col items-center p-4 sm:p-5
                   bg-green-100 rounded-xl
                   shadow-[10px_10px_25px_rgba(0,255,0,0.25)]
                   hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)]
                   transition"
          >
            <img src="/img/skck.png" class="w-16 h-16 sm:w-20 sm:h-20 mb-3" />
            <p class="font-medium text-center text-green-700 text-sm sm:text-base">
              Surat Pengantar SKCK
            </p>
          </a>

          <a href="{{ route('layanan.index') }}" class="reveal flex flex-col items-center p-4 sm:p-5 bg-green-100 rounded-xl shadow-[10px_10px_25px_rgba(0,255,0,0.25)] hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)] transition">
            <img src="/img/keteranganDomisili.png" class="w-16 h-16 sm:w-20 sm:h-20 mb-3" />
            <p class="font-medium text-center text-green-700 text-sm sm:text-base">
              Surat Domisili
            </p>
          </a>

          <a href="{{ route('layanan.index') }}" class="reveal flex flex-col items-center p-4 sm:p-5 bg-green-100 rounded-xl shadow-[10px_10px_25px_rgba(0,255,0,0.25)] hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)] transition">
            <img src="/img/sktm.png" class="w-16 h-16 sm:w-20 sm:h-20 mb-3" />
            <p class="font-medium text-center text-green-700 text-sm sm:text-base">
              SKTM
            </p>
          </a>

          <a href="{{ route('layanan.index') }}" class="reveal flex flex-col items-center p-4 sm:p-5 bg-green-100 rounded-xl shadow-[10px_10px_25px_rgba(0,255,0,0.25)] hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)] transition">
            <img src="/img/keteranganKerja.png" class="w-16 h-16 sm:w-20 sm:h-20 mb-3" />
            <p class="font-medium text-center text-green-700 text-sm sm:text-base">
              Keterangan Usaha
            </p>
          </a>

        </div>
      </div>

    </div>
  </div>
  {{-- berita --}}
    <div class="hero absolute w-full z-40 bottom-0 overflow-hidden bg-green-700 border-green-700 text-white py-3">
      <div class="flex items-center gap-4">
  
          {{-- <img class="max-w-16" src="img/logounisla.png" alt="img"> --}}
  
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



<main>
<section class="relative w-full min-h-screen overflow-hidden">

  <!-- Background -->
  <div class="absolute inset-0 z-10 bg-gradient-to-b from-white via-emerald-100/80 to-emerald-200"></div>

  <!-- CONTENT -->
  <div class="relative z-20 min-h-screen flex items-center px-4 py-16">
    <div class="w-full max-w-7xl mx-auto">

      <!-- GRID UTAMA -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

        <!-- ================= STATISTIK WARGA ================= -->
        <div>

          <div class="text-center mb-6">
            <h2 class="text-xl sm:text-2xl font-semibold text-green-800">
              Statistik Data Warga
            </h2>
            <div class="mx-auto mt-2 w-24 h-1 bg-green-600 rounded-full"></div>
          </div>

          <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase">Total Warga</p>
              <p class="text-[3rem] ont-bold text-green-700">
                {{ number_format($totalWarga) }}
              </p>
            </div>

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase">Lansia (&gt; 50 th)</p>
              <p class="text-[3rem] font-bold text-green-700">
                {{ number_format($lansia) }}
              </p>
            </div>

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase">Balita (≤ 5 th)</p>
              <p class="text-[3rem] font-bold text-green-700">
                {{ number_format($balita) }}
              </p>
            </div>

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase mb-1">Status Nikah</p>
              @forelse ($statusNikah as $item)
                <p class="text-[1rem] text-gray-700">
                  {{ ucfirst($item->status_pernikahan) }} :
                  <span class="font-semibold text-green-700">
                    {{ $item->total }}
                  </span>
                </p>
              @empty
                <p class="text-xs text-gray-500">Data tidak tersedia</p>
              @endforelse
            </div>

          </div>
        </div>

        <!-- ================= DANA DESA ================= -->
        <div>
          <div class="text-center mb-6">
            <h2 class="text-xl sm:text-2xl font-semibold text-green-800">
              Transparansi Dana Desa
            </h2>
            <div class="mx-auto mt-2 w-28 h-1 bg-amber-500 rounded-full"></div>
            <p class="text-xs text-gray-600 mt-2">
              Tahun Anggaran {{ date('Y') }}
            </p>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase">Total Dana</p>
              <p class="text-[1.8rem] font-bold text-green-700">
                Rp {{ number_format($totalDana ?? 1500000000, 0, ',', '.') }}
              </p>
            </div>

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase">Terealisasi</p>
              <p class="text-[1.8rem] font-bold text-amber-600">
                Rp {{ number_format($danaTerealisasi ?? 975000000, 0, ',', '.') }}
              </p>
            </div>

            <div class="bg-white/20 rounded-xl p-4 text-center shadow">
              <p class="text-xs text-gray-600 uppercase">Sisa Dana</p>
              <p class="text-[1.8rem] font-bold text-red-600">
                Rp {{ number_format(($totalDana ?? 1500000000) - ($danaTerealisasi ?? 975000000), 0, ',', '.') }}
              </p>
            </div>

          </div>

{{-- Progress Realisasi --}}
@isset($persen)
<div class="bg-white/20 rounded-xl p-4 shadow">
    <div class="flex justify-between text-xs text-gray-600 mb-1">
        <span>Realisasi Anggaran</span>
        <span>{{ $persen }}%</span>
    </div>

    <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
        <div
            class="h-full bg-gradient-to-r from-green-500 to-amber-500"
            style="width: {{ $persen }}%"
        ></div>
    </div>
</div>
@endisset

        </div>
      </div>
    </div>
  </div>
</section>

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
        id="pengumuman"
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
                    {{ $item->isi }}
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
      <section class="relative py-20 overflow-hidden bg-white" id="progres">
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
                Progress {{ $item->persentase_progress }}%  ||  {{ $item->tanggal_mulai }}  ||  {{ $item->tanggal_selesai }}
            </p>
        </div>
    </div>
@endforeach

        </div>
      </section>
      <!-- Progres pembangunan end -->

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




    </main>
</x-app-layout>
