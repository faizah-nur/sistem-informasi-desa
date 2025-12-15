<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <!-- Hero Section Menu Kabar -->
  <section>
    <div class="hero md:relative md:h-screen md:px-16">
      <h1
        class="font-extrabold text-5xl md:text-9xl text-center text-green-700 mb-24 pt-16 tracking-widest"
      >
        INFO <span class="text-amber-400">WARGA</span>
      </h1>
      <img
        class="absolute left-1/2 -translate-x-1/2 top-17 md:top-24 drop-shadow-2xl drop-shadow-green-700/25 md:max-w-md max-w-60"
        src="/img/npc.png"
        alt="hero"
      />
      <!-- CONTENT -->
      <div
        class="content md:flex flex-col justify-center items-center px-5 md:mt-36 mt-52 relative z-50"
      >
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

        <h1 class="text-4xl md:text-3xl font-bold mb-4 text-gray-600 tracking-widest"><span class="text-sky-600">Kabar penting,</span><span class="text-rose-500">kegiatan,</span> <span class="text-amber-400">dan pengumuman</span><span class="text-green-400"> resmi desa.</span> </h1>

        <!-- Search Bar (Future Laravel Feature) -->
        <form action="#" method="GET" class="w-96 mx-auto">
          <div
            class="flex items-center text-lime-700 bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] overflow-hidden"
          >
            <input
              type="text"
              placeholder="Cari kabar desa..."
              class="w-full px-4 py-3 text-gray-700 focus:outline-none"
            />
            <button
              class="bg-green-600 hover:bg-green-700 text-white px-6 py-3"
            >
              Cari
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="max-w-5xl mx-auto py-10 px-4">
    <!-- Judul -->
    <h2 class="text-3xl font-semibold mb-6">Kabar Desa</h2>

    <!-- Search Bar (Nanti bisa pakai Laravel Query Search) -->
    <div
      class="mb-6 mt-20 text-lime-700 bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)]"
    >
      <input
        type="text"
        placeholder="Cari kabar..."
        class="w-full rounded-xl px-4 py-2"
      />
      <!-- Laravel: request()->input('search') -->
    </div>

    <!-- Filter Kategori (Nanti kategori bisa dinamis dari database) -->
    <div class="flex gap-2 flex-wrap mb-8">
      <button class="px-4 py-2 rounded-full bg-green-700">Semua</button>
      <button class="px-4 py-2 rounded-full bg-green-700">Berita</button>
      <button class="px-4 py-2 rounded-full bg-green-700">Pembangunan</button>
      <button class="px-4 py-2 rounded-full bg-green-700">Kegiatan</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Card 1 -->
      <div
        class="bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition p-4"
      >
        <img src="/img/pengumuman.jpeg" class="rounded-xl mb-3" />
        <h3 class="font-semibold text-xl mb-1 text-lime-600">
          Gotong Royong Bersama Warga
        </h3>
        <p class="text-gray-500 text-sm mb-2">
          Dipublikasikan: 10 Desember 2025
        </p>
        <p class="text-gray-700">
          Warga melaksanakan gotong royong membersihkan lingkungan desa...
        </p>
        <a
          href="detail.html"
          class="text-green-700 font-medium mt-3 inline-block"
        >
          Baca selengkapnya →
        </a>
      </div>

      <!-- Card 2 -->
      <div
        class="bg-green-100 shadow-[5px_5px_30px_rgba(0,255,0,0.35)] rounded-xl hover:shadow-[10px_10px_30px_rgba(0,255,0,0.35)] transition p-4"
      >
        <img src="/img/about.jpeg" class="rounded-xl mb-3" />
        <h3 class="font-semibold text-xl mb-1 text-lime-600">
          Progress Pembangunan Jalan
        </h3>
        <p class="text-gray-500 text-sm mb-2">
          Dipublikasikan: 8 Desember 2025
        </p>
        <p class="text-gray-700">
          Pembangunan jalan usaha tani telah mencapai 100% dan siap digunakan...
        </p>
        <a
          href="detail.html"
          class="text-green-700 font-medium mt-3 inline-block"
        >
          Baca selengkapnya →
        </a>
      </div>
    </div>

    <!-- Pagination (Nanti Laravel bisa generate otomatis) -->
    <div class="flex justify-center gap-2 mt-10">
      <button class="px-3 py-2 border rounded-lg">Prev</button>
      <button class="px-3 py-2 border rounded-lg bg-green-700 font-semibold">
        1
      </button>
      <button class="px-3 py-2 border rounded-lg">2</button>
      <button class="px-3 py-2 border rounded-lg">Next</button>
    </div>
  </section>
</x-layout>
