<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
<!-- HERO -->
<section class="relative flex items-center min-h-screen bg-white">
  <div class="w-full px-6 py-12 mx-auto max-w-7xl">
    <div class="grid items-center grid-cols-1 gap-10 lg:grid-cols-2">

      <!-- KONTEN KIRI -->
      <div class="text-center lg:text-left">
        <h2
          class="font-bold mt-10 text-green-700
                 text-3xl sm:text-4xl md:text-5xl lg:text-[4.5rem]
                 leading-tight"
        >
          {{ \App\Models\Setting::get('site_name', 'Nama Website') }}
        </h2>

        <p class="mt-4 text-sm text-slate-700 sm:text-base md:text-lg">
          Sistem Informasi Layanan Desa berbasis digital yang dirancang untuk
          mempermudah pengajuan surat, meningkatkan efisiensi pelayanan
          administrasi, serta mewujudkan transparansi dan kenyamanan bagi
          masyarakat.
        </p>

        <a
          href="{{ route('layanan.index') }}"
          class="inline-block px-6 py-2 mt-6 font-medium text-white transition rounded-lg bg-amber-600 hover:bg-amber-500"
        >
          LAYANAN
        </a>
        <a
          href="#pengumuman"
          class="inline-block px-6 py-2 mt-6 font-medium text-white transition rounded-lg bg-amber-600 hover:bg-amber-500"
        >
          PENGUMUMAN
        </a>
        <a
          href="#progres"
          class="inline-block px-6 py-2 mt-6 font-medium text-white transition rounded-lg bg-amber-600 hover:bg-amber-500"
        >
          PROGRES PEMBANGUNAN
        </a>
      </div>

      <!-- KONTEN KANAN -->
      <div>
        <div
          class="grid max-w-4xl grid-cols-2 gap-4 mx-auto sm:grid-cols-2 lg:grid-cols-2 sm:gap-6"
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
            <img src="/img/skck.png" class="w-16 h-16 mb-3 sm:w-20 sm:h-20" />
            <p class="text-sm font-medium text-center text-green-700 sm:text-base">
              Surat Pengantar SKCK
            </p>
          </a>

          <a href="{{ route('layanan.index') }}" class="reveal flex flex-col items-center p-4 sm:p-5 bg-green-100 rounded-xl shadow-[10px_10px_25px_rgba(0,255,0,0.25)] hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)] transition">
            <img src="/img/keteranganDomisili.png" class="w-16 h-16 mb-3 sm:w-20 sm:h-20" />
            <p class="text-sm font-medium text-center text-green-700 sm:text-base">
              Surat Domisili
            </p>
          </a>

          <a href="{{ route('layanan.index') }}" class="reveal flex flex-col items-center p-4 sm:p-5 bg-green-100 rounded-xl shadow-[10px_10px_25px_rgba(0,255,0,0.25)] hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)] transition">
            <img src="/img/sktm.png" class="w-16 h-16 mb-3 sm:w-20 sm:h-20" />
            <p class="text-sm font-medium text-center text-green-700 sm:text-base">
              SKTM
            </p>
          </a>

          <a href="{{ route('layanan.index') }}" class="reveal flex flex-col items-center p-4 sm:p-5 bg-green-100 rounded-xl shadow-[10px_10px_25px_rgba(0,255,0,0.25)] hover:shadow-[5px_5px_20px_rgba(0,255,0,0.25)] transition">
            <img src="/img/keteranganKerja.png" class="w-16 h-16 mb-3 sm:w-20 sm:h-20" />
            <p class="text-sm font-medium text-center text-green-700 sm:text-base">
              Keterangan Usaha
            </p>
          </a>

        </div>
      </div>

    </div>
  </div>
  {{-- berita --}}
    <div class="absolute bottom-0 z-40 w-full py-3 overflow-hidden text-white bg-green-700 border-green-700 hero">
      <div class="flex items-center gap-4">
  
          {{-- <img class="max-w-16" src="img/logounisla.png" alt="img"> --}}
  
          <div class="w-full overflow-hidden">
              <div class="flex gap-12 ticker whitespace-nowrap">
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
  <div class="relative z-20 flex items-center min-h-screen px-4 py-16">
    <div class="w-full mx-auto max-w-7xl">

      <!-- GRID UTAMA -->
      <div class="grid items-start grid-cols-1 gap-8 lg:grid-cols-2">

        <!-- ================= STATISTIK WARGA ================= -->
        <div>

          <div class="mb-6 text-center">
            <h2 class="text-xl font-semibold text-green-800 sm:text-2xl">
              Statistik Data Warga
            </h2>
            <div class="w-24 h-1 mx-auto mt-2 bg-green-600 rounded-full"></div>
          </div>

          <div class="grid grid-cols-2 gap-4 sm:grid-cols-2">

            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="text-xs text-gray-600 uppercase">Total Warga</p>
              <p class="text-[3rem] ont-bold text-green-700">
                {{ number_format($totalWarga) }}
              </p>
            </div>

            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="text-xs text-gray-600 uppercase">Lansia (&gt; 50 th)</p>
              <p class="text-[3rem] font-bold text-green-700">
                {{ number_format($lansia) }}
              </p>
            </div>

            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="text-xs text-gray-600 uppercase">Balita (≤ 5 th)</p>
              <p class="text-[3rem] font-bold text-green-700">
                {{ number_format($balita) }}
              </p>
            </div>

            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="mb-1 text-xs text-gray-600 uppercase">Status Nikah</p>
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
          <div class="mb-6 text-center">
            <h2 class="text-xl font-semibold text-green-800 sm:text-2xl">
              Transparansi Dana Desa
            </h2>
            <div class="h-1 mx-auto mt-2 rounded-full w-28 bg-amber-500"></div>
            <p class="mt-2 text-xs text-gray-600">
              Tahun Anggaran {{ date('Y') }}
            </p>
          </div>

          <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2">

            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="text-xs text-gray-600 uppercase">Total Dana</p>
              <p class="text-[1.8rem] font-bold text-green-700">
                Rp {{ number_format($totalDana ?? 1500000000, 0, ',', '.') }}
              </p>
            </div>

            <a href="{{ route('dana-desa.realisasi') }}" class="block p-4 text-center transition shadow bg-white/20 rounded-xl hover:bg-white/30">
            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="text-xs text-gray-600 uppercase">Terealisasi</p>
              <p class="text-[1.8rem] font-bold text-amber-600">
                Rp {{ number_format($danaTerealisasi ?? 975000000, 0, ',', '.') }}
              </p>
            </div>
            </a>

            <div class="p-4 text-center shadow bg-white/20 rounded-xl">
              <p class="text-xs text-gray-600 uppercase">Sisa Dana</p>
              <p class="text-[1.8rem] font-bold text-red-600">
                Rp {{ number_format(($totalDana ?? 1500000000) - ($danaTerealisasi ?? 975000000), 0, ',', '.') }}
              </p>
            </div>

          </div>

{{-- Progress Realisasi --}}
@isset($persen)
<div class="p-4 shadow bg-white/20 rounded-xl">
    <div class="flex justify-between mb-1 text-xs text-gray-600">
        <span>Realisasi Anggaran</span>
        <span>{{ $persen }}%</span>
    </div>

    <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
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

        <!-- visi misi -->
      <section
        id="sekilas"
        class="relative px-4 overflow-hidden text-black bg-white py-14"
      >
        <div class="grid items-center max-w-6xl gap-10 mx-auto md:grid-cols-2">
          <!-- Gambar Parallax -->
          <div
            id="sekilasImg"
            class="relative w-full h-64 overflow-hidden transition-transform duration-300 transform shadow-lg md:h-80 rounded-2xl"
          > 
            <img src="{{ $visiMisi && $visiMisi->gambar ? asset('storage/' . $visiMisi->gambar)
              : asset('img/about.jpeg') }}" alt="Tentang Desa" class="object-cover w-full h-full"
          />
            {{-- <div class="absolute inset-0 bg-black/20"></div> --}}
          </div>

          <!-- Konten muncul saat discroll -->
          <div
            id="sekilasText"
          >
        <h2 class="mb-2 font-extrabold md:text-2xl text-lime-600">
            Visi
        </h2>
        
        <p class="mb-5 leading-relaxed text-gray-700">
          {{ $visiMisi->visi ?? '-' }}
        </p>
        
        <h2 class="mb-2 font-extrabold md:text-2xl text-lime-600">
          Misi
        </h2>
        <p class="mb-5 leading-relaxed text-gray-700">
          {{ $visiMisi->misi ?? '-' }}
        </p>
            {{-- <a
              href="#"
              class="inline-block px-5 py-2 font-medium text-white transition rounded-lg shadow-md bg-lime-500 hover:bg-lime-600"
            >
              Baca selengkapnya →
            </a> --}}
          </div>
        </div>
      </section>
      {{-- perangkat --}}
      <section>
<div class="p-6 mx-auto max-w-7xl">

    <h1 class="mb-6 text-3xl font-bold text-center text-green-700">Perangkat Desa</h1>

    @if($perangkat->isEmpty())
        <p class="text-center text-gray-500">Belum ada data perangkat desa.</p>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
            @foreach($perangkat as $item)
                <div class="p-4 text-center bg-white rounded shadow">
                    <div class="mb-4">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                 class="object-cover w-24 h-24 mx-auto rounded-full">
                        @else
                            <div class="flex items-center justify-center w-24 h-24 mx-auto bg-gray-200 rounded-full">
                                <span class="text-gray-400">No Photo</span>
                            </div>
                        @endif
                    </div>
                    <h2 class="font-semibold">{{ $item->nama }}</h2>
                    <p class="text-sm text-gray-600">{{ $item->jabatan }}</p>
                </div>
            @endforeach
        </div>

        {{-- Tombol Lihat Detail --}}
        <div class="mt-6 text-center">
            <a href="{{ route('perangkat-desa.index') }}"
               class="px-4 py-2 text-white transition bg-green-600 rounded hover:bg-green-700">
               Lihat Detail
            </a>
        </div>
    @endif

      </section>

      <!-- Pengumuman Penting Section start -->
      <section
        id="pengumuman"
        class="relative py-20 mt-20 bg-fixed bg-center bg-cover"
        style="background-image: url('/img/sawah.jpeg')"
      >
        <!-- Overlay hijau -->
        <div class="absolute inset-0 bg-slate-900/30"></div>

        <div class="relative max-w-6xl px-4 mx-auto">
          <h2
            class="mb-10 text-3xl font-bold text-center text-white md:text-4xl"
          >
            Pengumuman Penting
          </h2>

          <!-- Grid Card Pengumuman -->
          <div class="grid gap-6 md:grid-cols-2">
    @forelse ($pengumuman as $item)
        <div
            class="flex gap-5 p-5 transition duration-300 transform border-l-4 border-green-600 shadow-lg reveal bg-white/90 backdrop-blur-md rounded-2xl hover:scale-105"
        >
            {{-- <img src="{{ asset('img/pengumuman.png') }}" alt="img" class="max-w-20" /> --}}

            <div class="isi">
                <h3 class="mb-2 text-lg font-semibold text-green-700">
                    {{ $item->judul }}
                </h3>

                <p class="text-sm leading-relaxed text-gray-700">
                    {{ $item->isi }}
                </p>

                <p class="mt-2 text-xs text-gray-500">
                    {{ $item->tanggal->translatedFormat('d F Y') }}
                </p>
            </div>
        </div>
    @empty
        <p class="col-span-2 text-center text-white">
            Belum ada pengumuman
        </p>
    @endforelse
          </div>
        </div>
      </section>

      <!-- Progres pembangunan start -->
      <section class="relative py-20 overflow-hidden bg-white" id="progres">
        <div class="relative max-w-5xl px-4 mx-auto space-y-10">
          <h2
            class="mb-10 text-3xl font-extrabold text-center text-green-700 md:text-4xl"
          >
            Progress Pembangunan Desa
          </h2>

@foreach ($progress as $item)
    <div
        class="reveal flex gap-5 bg-white/90 p-6 rounded-2xl shadow-lg border-l-4 border-green-600 transition transform hover:scale-[1.03] duration-300"
    >

        <div class="w-full isi">
            <h3 class="mb-2 text-xl font-semibold text-green-700">
                {{ $item->judul_kegiatan }}
                —
                {{ $item->status }}
            </h3>

            <p class="leading-relaxed text-gray-700">
                {{ $item->deskripsi }}
            </p>

            <!-- Progress Bar -->
            <div class="w-full h-3 mt-4 overflow-hidden rounded-full bg-gray-300/50">
                <div
                    class="h-full transition-all duration-500 bg-green-600 rounded-full"
                    style="width: {{ $item->persentase_progress }}%"
                ></div>
            </div>

            <p class="mt-2 text-xs text-gray-500">
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
    <h2 class="mb-10 text-3xl font-extrabold text-center text-green-700 md:text-4xl">
        Galeri Kegiatan Desa
    </h2>

    <div class="grid grid-cols-2 gap-4 px-4 mt-10 md:grid-cols-4">
        @forelse ($galeri as $item)
            <div
                class="relative aspect-[4/3] rounded-xl overflow-hidden shadow-md
                       group transition-all duration-300 hover:shadow-xl"
            >
                <!-- IMAGE -->
                <div
                    class="absolute inset-0 transition-transform duration-500 bg-center bg-cover group-hover:scale-110"
                    style="background-image: url('{{ asset('storage/' . $item->gambar) }}')"
                ></div>

                <!-- OVERLAY -->
                <div
                    class="absolute inset-0 transition-all duration-300 opacity-0 bg-black/40 group-hover:opacity-100"
                ></div>

                <!-- TEXT -->
                <div
                    class="absolute bottom-0 left-0 right-0 p-3 text-white transition-all duration-300 translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100"
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
            <div class="col-span-2 py-16 text-center text-gray-500 md:col-span-4">
                <p class="text-lg font-semibold">
                    Belum ada galeri kegiatan
                </p>
                <p class="mt-1 text-sm">
                    Dokumentasi kegiatan desa akan ditampilkan di sini.
                </p>
            </div>
        @endforelse
    </div>
</section>
<!-- GALERI END -->




    </main>
</x-app-layout>
